<?php

namespace Lit\Config\Form\Form;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Form\FieldsController;

class FieldsConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = FieldsController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'form/fields';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Fields',
        ];
    }

    /**
     * Setup form page.
     *
     * @param  \Lit\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->group(function (CrudShow $form) {
                $form->info('Fields')
                    ->text('Examples of many of the form fields and how they can be used.')
                    ->width(1 / 2)
                    ->heading('h4');
                $form->info('Readonly Fields')
                    ->text('Each field has a read-only version which applies when the authenticated user doesnt have the permission to update the form.')
                    ->width(1 / 2)
                    ->heading('h4');
            })->class('mb-2');
        });

        $page->card(function ($form) {
            $form->group(function ($form) {
                $form->input('full_name')->hint('Please enter the full name.')->translatable(false)->width(1 / 2);
                $form->input('full_name')->translatable(false)->width(1 / 2)->readOnly();
            });

            $form->group(function ($form) {
                // TODO: info not working.
                $form->input('translatable_title')->info('The translatable field has a badge that shows the locale of the current value being edited.')->translatable()->width(1 / 2);
                $form->input('translatable_title')->translatable()->width(1 / 2)->readOnly();
            });

            $form->group(function ($form) {
                $form->password('password')->width(1 / 2);
                $form->password('password')->width(1 / 2)->readOnly();
            });

            $form->group(function ($form) {
                $form->select('article_type')->hint('Select the article type.')->options([
                    1 => 'News',
                    2 => 'Info',
                ])->width(1 / 2);
                $form->select('article_type')->options([
                    1 => 'News',
                    2 => 'Info',
                ])->width(1 / 2)->readOnly();
            });
        })->title('Basic Input Fields');

        $page->card(function ($form) {
            $form->group(function ($form) {
                $form->textarea('translatable_textarea')
                    ->translatable()
                    ->placeholder('Type something...')
                    ->hint('Please enter a description.')
                    ->width(1 / 2);
                $form->textarea('translatable_textarea')
                    ->translatable()
                    ->placeholder('Type something...')
                    ->width(1 / 2)->readOnly();
            });

            $form->group(function ($form) {
                $form->wysiwyg('wysiwyg_field')
                    ->translatable(false)
                    ->colors([
                        '#4951f2', '#f67693', '#f6ed76', '#9ff2ae', '#83c2ff',
                    ])
                    ->hint('What you see is what you get field.')
                    ->width(1 / 2);
                $form->wysiwyg('wysiwyg_field')
                    ->translatable(false)
                    ->colors([
                        '#4951f2', '#f67693', '#f6ed76', '#9ff2ae', '#83c2ff',
                    ])
                    ->width(1 / 2)
                    ->readOnly();
            });
        })->title('Text Fields');

        $page->card(function ($form) {
            $form->group(function ($form) {
                $form->date('date')->hint('Pick a date.')->width(6);
                $form->date('date')->width(6)->readOnly();
            });

            $form->group(function ($form) {
                $form->datetime('date_and_time')->hint('Pick a date and a time.')->width(6);
                $form->datetime('date_and_time')->width(6)->readOnly();
            });

            $form->group(function ($form) {
                $form->time('time')->hint('Pick a date and a time.')->width(6);
                $form->time('time')->width(6)->readOnly();
            });
        })->title('Date/Time Picker');

        $page->card(function ($form) {
            $form->group(function ($form) {
                $form->boolean('active')->width(1 / 2);
                // TODO: readonly
                $form->boolean('active')->width(1 / 2)->readOnly();
            });

            $form->group(function ($form) {
                $form->checkboxes('fruits')->options([
                    'orange'    => 'Orange',
                    'apple'     => 'Apple',
                    'pineapple' => 'Pineapple',
                    'grape'     => 'Grape',
                ])->hint('Select your fruits.')->width(6);
                // TODO: readonly
                $form->checkboxes('fruits')->options([
                    'orange'    => 'Orange',
                    'apple'     => 'Apple',
                    'pineapple' => 'Pineapple',
                    'grape'     => 'Grape',
                ])->width(6)->readOnly();

                // TODO: stacked box
                $form->checkboxes('stacked_fruits')->title('Stacked Checkboxes')->options([
                    'orange'    => 'Orange',
                    'apple'     => 'Apple',
                    'pineapple' => 'Pineapple',
                    'grape'     => 'Grape',
                ])->width(6)->stacked();
            });

            $form->group(function ($form) {
                $form->radio('type')->options([
                    'article' => 'Article',
                    'hint'    => 'Hint',
                ])->width(6);
                $form->radio('type')->options([
                    'article' => 'Article',
                    'hint'    => 'Hint',
                ])->width(6)->readOnly();

                $form->radio('type')->options([
                    'article' => 'Article',
                    'hint'    => 'Hint',
                ])->width(6)->stacked();
            });

            $form->group(function ($form) {
                $form->range('range_slider')->min(1)->max(10)->step(1)->width(1 / 2);
                $form->range('range_slider')->min(1)->max(10)->step(1)->width(1 / 2)->readOnly();
            });

            // ...
        })->title('Other');

        $page->card(function ($form) {
            $form->group(function ($form) {
                $form->image('croppable_images')
                    ->translatable()
                    ->firstBig()
                    ->crop(16 / 9)
                    ->hint('The first image is shown big here in order to imply that it will be used as a preview.')
                    ->maxFiles(5)
                    ->width(1 / 2);

                $form->image('croppable_images')
                    ->translatable()
                    ->readOnly()
                    ->firstBig()
                    ->width(1 / 2);
            });

            $form->group(function ($form) {
                $form->image('single_image')
                    ->translatable(false)
                    ->maxFiles(1);

                $form->image('header_image')
                    ->maxFiles(1)
                    ->expand()
                    ->hint('You may show the expanded image, instead of a square.');
            })->width(1 / 2);
        })->title('Images');
    }
}
