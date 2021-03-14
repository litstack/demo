<?php

namespace Lit\Config\Crud;

use App\Models\FormIndexTable;
use App\Models\Product;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudColumnBuilder;
use Ignite\Crud\CrudIndex;
use Ignite\Page\Table\Table;
use Lit\Actions\Booking\SendMailAction;
use Lit\Filters\CreatedAtFilter;
use Lit\Filters\UserNameFilter;
use Lit\Http\Controllers\Crud\FormIndexTableController;

class FormIndexTableAdvancedConfig extends CrudConfig
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
     * @param Product|null product
     * @return array
     */
    public function names(Product $product = null)
    {
        return [
            'singular' => 'Table',
            'plural'   => 'Advanced Tabel',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'form/advanced-table';
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
            ->search('title', 'user.name')
            ->query(function ($query) {
                $query->with('user');
            })
            ->filter([
                'Create At' => CreatedAtFilter::class,
                'User'      => UserNameFilter::class,
            ])
            ->action('Custom Action', SendMailAction::class)
            ->sortBy(array_merge(
                Table::numericOrder('id'),
                Table::alphabeticOrder('title'),
            ));
    }

    protected function makeIndexTableColumns(CrudColumnBuilder $table)
    {
        $table->image('Image')->src('{image.url}');
        $table->avatar('Image')->src('{user.profile_image.url}')->label('Avatar');

        $table->relation('user', UserConfig::class)
            ->label('Relation (user)')
            ->value('{user.name}')
            ->sortBy('user.name')
            ->style('white-space: nowrap;');

        $table->action('Custom Action', SendMailAction::class);
        $table->actions([
            'Custom Action'         => SendMailAction::class,
            'Another Custom Action' => SendMailAction::class,
        ]);

        $table->field('Inline Field')->input('title');
        $table->field('Boolean Field')->boolean('active');

        $table->progress('progress', $max = 100)->label('Progress');
    }
}
