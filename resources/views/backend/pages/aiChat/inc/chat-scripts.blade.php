<script>
    "use strict";

    // scroll
    function initScrollToChatBottom() {
        var ChatDiv = $(".tt-conversation");
        var height = ChatDiv[0]?.scrollHeight;
        ChatDiv.scrollTop(height);
    }
    initScrollToChatBottom();

    // get conversations
    function getConversations($this, ai_chat_category_id) {
        let hasActiveClass = $($this).hasClass('active');
        if (hasActiveClass) {
            return;
        }

        $('.list-and-messages-wrapper').addClass('d-none');
        $('.list-and-messages-wrapper-loader').removeClass('d-none');

        $($this).closest('.expert-list').find('a.active').removeClass('active');
        $($this).addClass('active');

        let data = {
            ai_chat_category_id: ai_chat_category_id
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            method: 'POST',
            url: '{{ route('chat.getConversations') }}',
            data: data,
            beforeSend: function() {},
            complete: function() {
                setTimeout(() => {
                    $('.list-and-messages-wrapper-loader').addClass('d-none');
                    $('.list-and-messages-wrapper').removeClass('d-none');
                    initScrollToChatBottom();
                }, 300);
            },
            success: function(data) {
                if (data.status == 200) {
                    $('.list-and-messages-wrapper').empty();
                    $('.list-and-messages-wrapper').html(data.chatRight);
                    initFeather();
                    initEditUpdate();
                    initMsgForm();

                } else {
                    if (data.message) {
                        notifyMe('error', data.message);
                    } else {
                        notifyMe('error', '{{ localize('Something went wrong') }}');
                    }
                }
            },
            error: function(data) {
                if (data.status == 400 && data.message) {
                    notifyMe('error', data.message);
                } else {
                    notifyMe('error', '{{ localize('Something went wrong') }}');
                }
            }
        });
    }

    // new conversation
    function startNewConversation() {
        let expertId = $('.expert-list a.active').data('category_id');

        let data = {
            ai_chat_category_id: expertId
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            method: 'POST',
            url: '{{ route('chat.store') }}',
            data: data,
            beforeSend: function() {
                $('.new-conversation-btn').prop('disabled', true);
            },
            complete: function() {
                $('.new-conversation-btn').prop('disabled', false);
            },
            success: function(data) {
                if (data.status == 200) {
                    $('.ai-chat-list').empty();
                    $('.messages-container').empty();
                    $('.ai-chat-list').html(data.chatList);
                    $('.messages-container').html(data.messagesContainer);
                    initFeather();
                    initEditUpdate();
                    initMsgForm();
                } else {
                    if (data.message) {
                        notifyMe('error', data.message);
                    } else {
                        notifyMe('error', '{{ localize('Something went wrong') }}');
                    }
                }
            },
            error: function(data) {
                if (data.status == 400 && data.message) {
                    notifyMe('error', data.message);
                } else {
                    notifyMe('error', '{{ localize('Something went wrong') }}');
                }
            }
        });
    }

    // edit - update chat
    function initEditUpdate() {
        $(".tt_editable").each(function() {
            var $this = this;
            $($this).on("click", async function() {
                var name = $this.dataset.name;
                $(".tt_update_text[data-name='" + name + "']").attr("contenteditable", "true")
                    .focus();

            });
        });

        $(".tt_update_text").each(function() {
            var $this = this;
            $($this).on("focusout", async function() {
                var chatId = $($this).data('id');
                var value = $this.innerHTML;
                var data = {
                    chatId,
                    value
                }
                var response = await updateChat(data);
            });
        });
    }
    initEditUpdate();

    // update chat
    async function updateChat(data) {
        let result = $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            method: 'POST',
            url: '{{ route('chat.update') }}',
            data: data,
            success: function(response) {
                // do nothing
            },
            error: function(data) {
                notifyMe('error', '{{ localize('Something went wrong') }}');
            }
        });

    }

    // get messages of conversation
    function getMessagesOfConversation($this, chatId) {
        let hasActiveClass = $($this).hasClass('active');
        if (hasActiveClass) {
            return;
        }

        $('.messages-container').addClass('d-none');
        $('.messages-container-loader').removeClass('d-none');

        $($this).closest('.tt-chat-history-list').find('a.active').removeClass('active');
        $($this).addClass('active');

        let data = {
            chatId: chatId
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            method: 'POST',
            url: '{{ route('chat.getMessages') }}',
            data: data,
            beforeSend: function() {},
            complete: function() {
                setTimeout(() => {
                    $('.messages-container-loader').addClass('d-none');
                    $('.messages-container').removeClass('d-none');
                    initScrollToChatBottom();
                }, 300);
            },
            success: function(data) {
                if (data.status == 200) {
                    $('.messages-container').empty();
                    $('.messages-container').html(data.messagesContainer);
                    initFeather();
                    initMsgForm();

                } else {
                    if (data.message) {
                        notifyMe('error', data.message);
                    } else {
                        notifyMe('error', '{{ localize('Something went wrong') }}');
                    }
                }
            },
            error: function(data) {
                if (data.status == 400 && data.message) {
                    notifyMe('error', data.message);
                } else {
                    notifyMe('error', '{{ localize('Something went wrong') }}');
                }
            }
        });
    }

    // send new message
    function initMsgForm() {
        $('#chat_form').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            let prompt = form.find('#prompt').val();
            let userName = '{{ auth()->user()->name }}';
            let userAvatar = '{{ uploadedAsset(auth()->user()->avatar) }}';

            let newMsg = `<div class="d-flex justify-content-end mb-4 tt-message-wrap tt-message-me">
                        <div class="d-flex flex-column align-items-end">
                          <div class="d-flex align-items-start"> 
                          <div class="p-3 me-3 rounded-3 mw-450 tt-message-text">
                            ${prompt}
                            </div> 
                            <div class="avatar avatar-md flex-shrink-0">
                              <img class="rounded-circle" src="${userAvatar}" alt=" avatar" />
                            </div> 
                          </div> 
                        </div>
                      </div>`;
            $('.messages-wrapper').append(newMsg);

            initScrollToChatBottom();


            var data = form.serialize();
            let chatId = $('body').find('.ai-chat-list a.active').data('id');
            let categoryId = $('body').find('.tt-chat-user-list a.active').data('category_id');

            data += `&chat_id=${chatId}&category_id=${categoryId}`;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                method: 'POST',
                url: '{{ route('chat.newMessage') }}',
                data: data,
                beforeSend: function() {
                    $('.msg-send-btn').prop('disabled', true);
                    cloneLoader();
                    $('.new-msg-loader').first().removeClass('d-none');
                    setTimeout(() => {
                        initScrollToChatBottom();
                    }, 300);

                },
                complete: function() {
                    $('#prompt').val('');
                },
                success: function(data) {
                    if (data.status == 200) {
                        let url = '{{ route('chat.process') }}'
                        const eventSource = new EventSource(`${url}`, {
                            withCredentials: true
                        });

                        eventSource.onmessage = function(e) {
                            if (e.data == "[DONE]") {
                                $('.new-msg-loader').first().removeClass('new-msg-loader');
                                $('.msg-send-btn').prop('disabled', false);
                                eventSource.close();
                            } else {
                                let txt = JSON.parse(e.data).choices[0].delta.content;
                                if (txt !== undefined) {
                                    txt = txt.replace(/(?:\r\n|\r|\n)/g, '<br>');

                                    let oldValue = '';

                                    if ($('.new-msg-loader:first .tt-message-text').find(
                                            '.tt-text-preloader').length !== 0) {
                                        $('.new-msg-loader:first .tt-message-text')
                                            .empty();
                                        $('.new-msg-loader').first().removeClass(
                                            'd-none');

                                    } else {
                                        oldValue += $('.new-msg-loader:first .tt-message-text')
                                            .html();
                                    }
                                    $('.new-msg-loader:first .tt-message-text').html(oldValue +
                                        txt);
                                }

                            }
                            initScrollToChatBottom();
                        };

                        eventSource.onerror = function(e) {
                            eventSource.close();
                        };
                    } else {
                        notifyMe('error', data.message);
                        $('.new-msg-loader').first().remove();
                    }
                }
            });
        });
    }
    initMsgForm();

    // show loader
    function cloneLoader() {
        let cloned = $(".new-msg-loader").clone();
        $('.messages-wrapper').append(cloned);
        initCopyMsg();
    }

    // download  contents 
    $(".downloadChatBtn").on("click", function() {
        const button = event.currentTarget;
        const docType = button.dataset.docType;
        const docName = button.dataset.docName || 'Project';

        const content = $(".downloadChat").html();

        const html = `
<html ${ this.doctype === 'doc' ? 'xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40"' : '' }>
<head>
	<meta charset="utf-8" />
	<title>${ docName }</title>
</head>
<body>
	${ content }
</body>
</html>`;

        if (docType == "pdf") {
            var printWindow = window.open('', '', 'height=600,width=900');
            printWindow.document.write(`<html><head><title>${docName}</title>`);
            printWindow.document.write('</head><body >');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
            printWindow.close();
        } else {
            const url =
                `${ docType === 'doc' ? 'data:application/vnd.ms-word;charset=utf-8' : 'data:text/plain;charset=utf-8' },${ encodeURIComponent( html ) }`;

            const downloadLink = document.createElement("a");
            document.body.appendChild(downloadLink);
            downloadLink.href = url;
            downloadLink.download = `${ docName }.${ docType }`;
            downloadLink.click();

            document.body.removeChild(downloadLink);
        }

    });

    // copy contents 
    $(".copyChat").on("click", function() {
        var html = document.querySelector('#downloadChat');
        var msg = '{{ localize('Chat has been copied successfully') }}';

        let copyText = document.getElementById("downloadChat").innerHTML;

        copyText = copyText.replaceAll(/(?:\r\n|\r|\n)/g, '');
        copyText = copyText.replaceAll('                        ', ' ');
        copyText = copyText.replaceAll('     ', ' ');
        copyText = copyText.replaceAll('    ', '');
        copyText = copyText.replaceAll('<br>', '\n');
        copyText = copyText.replaceAll('<span>', '');
        copyText = copyText.replaceAll('</span>', '');

        navigator.clipboard.writeText(copyText);
        notifyMe('success', msg);
    });

    // copy-msg-btn
    function initCopyMsg() {
        $(".copy-msg-btn").each(function() {
            var $this = this;
            $($this).on("click", async function() {
                var type = $(this).data('type');
                var msg = '{{ localize('Message has been copied successfully') }}';
                var copyText = $(this).closest('.msg-wrapper').find('.tt-message-text').html();
                navigator.clipboard.writeText(copyText);
                notifyMe('success', msg);
            });
        });
    }
    initCopyMsg();
</script>
