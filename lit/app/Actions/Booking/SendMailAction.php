<?php

namespace Lit\Actions\Booking;

use Ignite\Page\Actions\ActionModal;
use Ignite\Page\Actions\AttributeBag;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class SendMailAction
{
    public function modal(ActionModal $modal)
    {
        $modal->confirmText('Send '.fa('paper-plane'));

        $modal->form(function ($form) {
            $form->input('subject');
            $form->text('message');
        });
    }

    /**
     * Run the action.
     *
     * @param  Collection   $models
     * @return JsonResponse
     */
    public function run(Collection $models, AttributeBag $attributes)
    {
        foreach ($models as $model) {
            // Send Mail to model.
            // $attributes->subject
            // $attributes->message
        }

        return response()->success('Mail was sent.');
    }
}
