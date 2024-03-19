<!--Paypal-->
@if (getSetting('enable_paypal') == 1)
    <option value="paypal">{{ localize('Paypal') }}</option>
@endif

<!--stripe-->
@if (getSetting('enable_stripe') == 1)
    <option value="stripe">{{ localize('Stripe') }}</option>
@endif

<!--paytm-->
@if (getSetting('enable_paytm') == 1)
    <option value="paytm">{{ localize('Paytm') }}</option>
@endif

<!--razorpay-->
@if (getSetting('enable_razorpay') == 1)
    <option value="razorpay">{{ localize('Razorpay') }}</option>
@endif

<!--iyzico-->
@if (getSetting('enable_iyzico') == 1)
    <option value="iyzico">{{ localize('Iyzico') }}</option>
@endif

<!--paystack-->
@if (getSetting('enable_paystack') == 1)
    <option value="paystack">{{ localize('Paystack') }}</option>
@endif


<!--flutterwave-->
@if (getSetting('enable_flutterwave') == 1)
    <option value="flutterwave">{{ localize('Flutterwave') }}</option>
@endif

<!--duitku-->
@if (getSetting('enable_duitku') == 1)
    <option value="duitku">{{ localize('Duitku') }}</option>
@endif

<!--yookassa-->
@if (getSetting('enable_yookassa') == 1)
    <option value="yookassa">{{ localize('Yookassa') }}</option>
@endif

<!--molile-->
@if (getSetting('enable_molile') == 1)
    <option value="molile">{{ localize('Molile') }}</option>
@endif

<!--mercadopago-->
@if (getSetting('enable_mercadopago') == 1)
    <option value="mercadopago">{{ localize('Mercadopago') }}</option>
@endif

<!--midtrans-->
@if (getSetting('enable_midtrans') == 1)
    <option value="midtrans">{{ localize('Midtrans') }}</option>
@endif

<!--offline-->
@if (getSetting('enable_offline') == 1)
    <option value="offline">{{ localize('Offline') }}</option>
@endif
