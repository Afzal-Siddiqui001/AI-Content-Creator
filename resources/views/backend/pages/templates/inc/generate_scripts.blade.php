<script>
    const voicesData = <?php echo json_encode($languages_voices); ?>;
    $(document).on('submit', '.generate-voice-form', function(e) {
        e.preventDefault();
        let status = $('#status').val();
        if (!status) {
            notifyMe('warning', '{{ localize('Please Enable Voice Over from Voice Settings') }}');
            return;
        }
        document.getElementById("generate_speech_button").disabled = true;
        document.getElementById("generate_speech_button").innerHTML = "Please Wait...";

        var formData = new FormData();
        var speechData = [];
        formData.append('title', $('#title').val());
        formData.append('voice', $('#voice').val());
        formData.append('lang', $('#languages').val());
        formData.append('speed', $('#speed').val());
        formData.append('b_reak', $('#break').val());
        var data = {
            content: $('.defaultcontent').val()
        }
        speechData.push(data);
        $('.speeches .speech').each(function() {
            var data = {
                content: $(this).find('textarea').val()
            };
            speechData.push(data);
        });

        var jsonData = JSON.stringify(speechData);
        formData.append('speeches', jsonData);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            type: "post",
            url: '{{ route('t2s.generate') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                clearData();
                notifyMe(data.response.status ? 'success' : 'warning', data.response.message);
                if (data.response.status === true) {
                    $("#voice_list_table").html('');
                    $("#voice_list_table").html(data.response.view);
                    initFeather();
                    initJqueryEvents();
                    $("table.tt-footable").footable({
                        on: {
                            "ready.ft.table": function(e, ft) {
                                $(".confirm-delete").click(function(e) {
                                    e.preventDefault();
                                    var url = $(this).data("href");
                                    $("#delete-modal").modal("show");
                                    $("#delete-link").attr("href", url);
                                });
                            },
                        },
                    });
                }
                document.getElementById("generate_speech_button").disabled = false;
                document.getElementById("generate_speech_button").innerHTML =
                    '{{ localize('Generate Speech') }}';
            },
            error: function(data) {
                var err = data.responseJSON ? data.responseJSON.errors : data.responseText.errors;
                $.each(err, function(index, value) {
                    toastr.error(value);
                });
                document.getElementById("generate_speech_button").disabled = false;
                document.getElementById("generate_speech_button").innerHTML = "Save";
            }
        });

    })

    function clearData() {
        $('.speeches .speech').remove();
        $('.defaultcontent').val('');
        $('#title').val('');
    }
    $(document).ready(function() {
        "use strict";

        populateVoiceSelect();

        $("#languages").on("change", function() {
            populateVoiceSelect();
        });

        function populateVoiceSelect() {
            const selectedLanguage = $("#languages").val();
            const selectedOptions = voicesData[selectedLanguage];
            const voiceSelect = $("#voice");

            voiceSelect.empty();

            if (selectedOptions) {
                selectedOptions.forEach(option => {
                    $("<option></option>")
                        .val(option.value)
                        .text(option.label)
                        .appendTo(voiceSelect);
                });
            }
        }

        $('.add-new-text').click(function() {

            var speechContent = `
                <div class="speech mb-4">
                    <a class="float-end mb-1 delete-speech cursor-pointer"><i data-feather="trash-2"
                                                                class="me-2 icon-14 text-danger">delete</i></a>
                    <textarea class="form-control content" name="content[]" id="text" rows="4"
                    placeholder="{{ localize('Type your text') }}"></textarea>
                </div>
            `;

            $('.speeches').append(speechContent);
            initFeather();
        });

        $(document).on('click', '.delete-speech', function() {
            $(this).closest('.speech').remove();
        });
    });
</script>
