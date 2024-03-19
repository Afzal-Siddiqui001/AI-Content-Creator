<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\Payments\PaymentsController;
use App\Http\Controllers\Controller;
use App\Models\SubscriptionHistory;
use App\Models\SubscriptionPackage;
use App\Traits\SubscriptionHistoryTrait;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    use SubscriptionHistoryTrait;
    # subscribe
    public function subscribe(Request $request)
    {
        if ($this->limitPackagePurchase() == false) {
            flash(localize("Operation Failed. You Can't Purchase More Than 2 package"))->warning();
            return redirect()->back();
        }
        if ($request->payment_method == 'offline') {
            $data = $this->subscriptionHistoryStore($request);
            if ($data == true) {
                flash(localize('Operation successfully. Please Wait For Approval'))->success();
            } else {
                flash(localize('Operation Failed'))->error();
            }
            return redirect()->back();
        }

        $package = SubscriptionPackage::where('id', $request->package_id)->first(['price']);

        $request->session()->put('package_id', $request->package_id);

        $request->session()->put('amount', formatPrice($package->price, false, false, false, false));

        $request->session()->put('request_amount', formatPrice($request->offline_amount, false, false, false, false));

        $request->session()->put('payment_method', $request->payment_method);

        # init payment
        $payment = new PaymentsController;
        return $payment->initPayment();
    }
    public function offlinePayment($request)
    {
        $package = SubscriptionPackage::where('id', $request->package_id)->first();
    }
}
