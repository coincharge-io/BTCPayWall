<?php

/**
 * Digital Download
 *
 * @package    BTCPayWall
 * @subpackage Admin/Payments_Table
 * @copyright  Copyright (c) 2021, Coincharge
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @since      1.0
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('WP_List_Table')) {
    include_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Payments_Table extends WP_List_Table
{
    public $items;

    public function __construct()
    {
        parent::__construct(
            [
                'singular' => __('Payment', 'btcpaywall'),
                'plural'   => __('Payments', 'btcpaywall'),
                'ajax'     => false
            ]
        );
    }
    public function get_bulk_actions()
    {
        $actions = array(
            'remove_older_1' => 'Remove unpaid records older than 1 day',
            'remove_older_7' => 'Remove unpaid records older than 7 day',
        );
        return $actions;
    }
    public function process_bulk_action()
    {
        $nonce = isset($_REQUEST['_wpnonce']) ? $_REQUEST['_wpnonce'] : '';

        if (!wp_verify_nonce($nonce, 'btcpaywall_remove_old_records')) {
            return;
        }

        if ('remove_older_1' === $this->current_action()) {

            $payments = new BTCPayWall_Payment();
            return $payments->delete_older_than_day();
        } elseif ('remove_older_7' === $this->current_action()) {
            $payments = new BTCPayWall_Payment();
            return $payments->delete_older_than_7days();
        }
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
            'id'    => __('Id', 'btcpaywall'),
            'details'   => __('Details', 'btcpaywall'),
            'date' => __('Date', 'btcpaywall'),
            'blog'   => __('Post/Page', 'btcpaywall'),
            'type'   => __('Type', 'btcpaywall'),
            'status'    => __('Status', 'btcpaywall'),
            'payment_method'    => __('Payment method', 'btcpaywall'),
            'amount'  => __('Amount', 'btcpaywall'),
            'currency'    => __('Currency', 'btcpaywall'),
            'invoice_id'    => __('Invoice id', 'btcpaywall'),
        );
    }


    public function prepare_items()
    {
        $search_query = isset($_REQUEST['s']) ? sanitize_text_field($_REQUEST['s']) : '';
        $this->_column_headers = array($this->get_columns(), array(), array(), 'cb');
        $this->process_bulk_action();

        $per_page = $this->get_items_per_page('payments_per_page', 5);
        $current_page = $this->get_pagenum();
        $total_items = self::record_count();

        $this->set_pagination_args(
            [
                'total_items' => $total_items,
                'per_page' => $per_page
            ]
        );
        $this->items = self::get_payments($per_page, $current_page, $search_query);
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
    public static function get_payments($per_page = 5, $page_number = 1, $search_query = '')
    {
        $payments = new BTCPayWall_Payment();
        return $payments->get_filtered_payments($per_page, $page_number, $search_query);
    }
    /**
     * Generates content for a single row of the table.
     *
     * @param object $item        The current item.
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
                return esc_html(btcpaywall_round_amount($item['currency'], $item['amount']));
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
        $search_query = $_REQUEST['s'] ?? '';
        wp_nonce_field('btcpaywall_remove_old_records');
        ?>
        <div class="tablenav <?php echo esc_attr($which); ?>">
            <div class="alignleft actions bulkactions">
                <?php $this->bulk_actions($which); ?>
                <label for="search_field">Search:</label>
                <input type="text" id="search_field" name="s" value="<?php echo esc_attr($search_query); ?>" />
                <input type="submit" class="button" value="Search" />
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
