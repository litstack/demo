<?php

namespace Lit\Config\Crud;

use App\Models\FormIndexTable;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudColumnBuilder;
use Ignite\Crud\CrudIndex;
use Ignite\Page\Table\Table;
use Illuminate\Database\Eloquent\Model;
use Lit\Actions\Booking\SendMailAction;
use Lit\Http\Controllers\Crud\FormIndexTableController;

class FormIndexTableConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = FormIndexTable::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = FormIndexTableController::class;

    /**
     * Model singular and plural name.
     *
     * @param  Model|null $model
     * @return array
     */
    public function names($model = null)
    {
        return [
            'singular' => 'Table',
            'plural'   => 'Basic Table',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'form/table';
    }

    /**
     * Build index page.
     *
     * @param  \Ignite\Crud\CrudIndex $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        $page->table(fn ($table) => $this->makeIndexTableColumns($table))
            ->search('title')
            ->query(function ($query) {
                // $query->withCount('orders');
            })
            ->filter([
                'State' => [
                    'pending' => 'pending',
                    'success' => 'success',
                    'failed'  => 'failed',
                ],
            ])
            ->action('Custom Action', SendMailAction::class)
            ->sortBy(array_merge(
                Table::numericOrder('id'),
                Table::alphabeticOrder('title'),
            ));
    }

    protected function makeIndexTableColumns(CrudColumnBuilder $table)
    {
        $table->col('Title')->value('{title}')->sortBy('title');
        $table->col('Stipped Html')->value('{html_text}')->stripHtml()->maxChars(25)->nowrap();
        $table->money('money', 'EUR', 'de_DE');
        $table->date('created_at', 'LL', isoFormat: true)->label('Formatted Date/Time')->nowrap();
        $table->col('State')->value('state', [
            'success'  => '<div class="badge badge-success">{state}</div>',
            'canceled' => '<div class="badge badge-danger">{state}</div>',
            'pending'  => '<div class="badge badge-info">{state}</div>',
        ])->sortBy('state');
        $table->view('lit::columns.foo')->label('Blade View');
    }
}
