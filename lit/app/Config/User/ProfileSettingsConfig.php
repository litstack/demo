<?php

namespace Lit\Config\User;

use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\Config\Traits\ConfiguresProfileSettings;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\User\ProfileSettingsController;
use Lit\Models\User;

class ProfileSettingsConfig extends CrudConfig
{
    use ConfiguresProfileSettings;

    /**
     * Model class.
     *
     * @var string
     */
    public $model = User::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ProfileSettingsController::class;

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => $this->title(),
            'plural'   => $this->title(),
        ];
    }

    /**
     * Route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'profile';
    }

    /**
     * Setup create and edit form.
     *
     * @param  \Ignite\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        // settings
        $this->settings($page);

        // language
        $this->language($page);

        // security
        $this->security($page);
    }

    /**
     * Build settings form.
     *
     * @param  CrudShow $page
     * @return void
     */
    public function settings(CrudShow $page)
    {
        $page->info(ucwords(__lit('base.general')))->width(4);
        $page->card(function ($form) {
            $form->input('first_name')
                ->width(6)
                ->title(ucwords(__lit('base.first_name')));

            $form->input('last_name')
                ->width(6)
                ->title(ucwords(__lit('base.last_name')));

            $form->modal('change_email')
                ->title('E-Mail')
                ->variant('primary')
                ->preview('{email}')
                ->name('Change E-Mail')
                ->confirmWithPassword()
                ->form(function ($modal) {
                    $modal->input('email')
                        ->width(12)
                        ->rules('required', function ($attribute, $value, $fail) {
                            $fail("Whooop's this is just a demo.");
                        })
                        ->title('E-Mail');
                })->width(6);

            $form->input('username')
                ->width(6)
                ->title(ucwords(__lit('base.username')))
                ->rules('required', function ($attribute, $value, $fail) {
                    $fail("Whooop's this is just a demo.");
                });
        })->width(8)->class('mb-5');
    }

    /**
     * User security.
     *
     * @param  CrudShow $page
     * @return void
     */
    public function security($page)
    {
        $page->info(ucwords(__lit('base.security')))->width(4);

        $page->card(function ($form) {
            $form->modal('change_password')
                ->title('Password')
                ->variant('primary')
                ->name(fa('user-shield').' '.__lit('lit.profile.change_password'))
                ->form(function ($modal) {
                    $modal->password('old_password')
                        ->title('Old Password')
                        ->confirm()
                        ->rules(function ($attribute, $value, $fail) {
                            $fail("Whooop's this is just a demo.");
                        });

                    $modal->password('password')
                        ->title('New Password')
                        ->rules('required', 'min:5')
                        ->minScore(0);

                    $modal->password('password_confirmation')
                        ->rules('required', 'same:password')
                        ->dontStore()
                        ->title('New Password')
                        ->noScore();
                });
        })->width(8);
    }
}
