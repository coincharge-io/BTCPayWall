<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Payments_Table extends WP_List_Table
{
    public $items;

    public function __construct()
    {
        parent::__construct([
            'singular' => __('Payment', 'sd'),
            'plural'   => __('Payments', 'sd'),
            'ajax'     => false
        ]);
    }
    /**
     * Get a list of columns.
     *
     * @return array
     */
    public function get_columns()
    {
        return array(
            'cb'    => '<input type="checkbox" />',
            'id'    => __('Id'),
            'details'   => __('Details'),
            'date' => __('Date'),
            'blog'   => __('Post/Page'),
            'type'   => __('Type'),
            'status'    => __('Status'),
            'payment_method'    => __('Payment method'),
            'amount'  => __('Amount'),
            'currency'    => __('Currency'),
            'invoice_id'    => __('Invoice id'),
        );
    }


    public function prepare_items()
    {
        $this->_column_headers = array($this->get_columns(), array(), array(), 'cb');
        $this->process_bulk_action();

        $per_page = $this->get_items_per_page('payments_per_page', 5);
        $current_page = $this->get_pagenum();
        $total_items = self::record_count();

        $this->set_pagination_args([
            'total_items' => $total_items,
            'per_page' => $per_page
        ]);

        $this->items = self::get_payments($per_page, $current_page);
    }
    protected function column_details($item)
    {
        return '<a href="' . add_query_arg('id', $item['invoice_id'], admin_url('admin.php?page=btcpw_payments&view=view-payment')) . '">' . __('View Payment Details', 'btcpaywall') . '</a>';
    }
    protected function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="bulk-delete[]" value="%1$s" />',
            $item['id']
        );
    }

    public static function record_count()
    {

        $record = new BTCPayWall_Payment();

        return $record->payment_count();
    }
    public static function get_payments($per_page = 5, $page_number = 1)
    {
        $payments = new BTCPayWall_Payment();
        return $payments->get_payments($per_page, $page_number);
    }
    /**
     * Generates content for a single row of the table.
     * 
     * @param object $item The current item.
     * @param string $column_name The current column name.
     */
    protected function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'id':
                return esc_html($item['id']);
            case 'details':
                return 'Details';
            case 'date':
                return esc_html($item['date_created']);
            case 'blog':
                return esc_html($item['page_title']);
            case 'type':
                return esc_html($item['revenue_type']);
            case 'status':
                return esc_html($item['status']);
            case 'payment_method':
                return esc_html($item['payment_method']);
            case 'amount':
                return esc_html($item['amount']);
            case 'currency':
                return esc_html($item['currency']);
            case 'invoice_id':
                return esc_html($item['invoice_id']);

            default:
                return 'Unknown';
        }
    }


    protected function display_tablenav($which)
    {
?>
        <div class="tablenav <?php echo esc_attr($which); ?>">

            <div class="alignleft actions bulkactions">
                <?php $this->bulk_actions($which); ?>
            </div>
            <?php
            $this->extra_tablenav($which);
            $this->pagination($which);

            ?>

            <br class="clear" />
        </div>
    <?php
    }


    public function display()
    {
        $singular = $this->_args['singular'];

        $this->display_tablenav('top');

        $this->screen->render_screen_reader_content('heading_list');
    ?>
        <table class="wp-list-table <?php echo implode(' ', $this->get_table_classes()); ?>">
            <thead>
                <tr>
                    <?php $this->print_column_headers(); ?>
                </tr>
            </thead>

            <tbody id="the-list" <?php
                                    if ($singular) {
                                        echo " data-wp-lists='list:$singular'";
                                    }
                                    ?>>
                <?php $this->display_rows_or_placeholder(); ?>
            </tbody>



        </table>
<?php
    }
}
new Payments_Table();
