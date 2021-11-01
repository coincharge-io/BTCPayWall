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
            'id'    => __('Id'),
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
        /* $this->_column_headers = array($this->get_columns(), array(), array(), 'cb');
        $per_page = $this->get_items_per_page('invoices_per_page', 5);
        $current_page = $this->get_pagenum();


        $this->items = $this->get_invoices($per_page, $current_page);
        $store_id = get_option('btcpw_btcpay_store_id');

        $args = array(
            'headers' => array(
                'Authorization' => 'token ' . get_option('btcpw_btcpay_auth_key_view'),
                'Content-Type' => 'application/json',
            ),
            'method' => 'GET',
            'timeout' => 20,
        );

        if (!empty($store_id)) {

            $url = get_option('btcpw_btcpay_server_url') . '/api/v1/stores/' . $store_id . '/invoices';


            $response = wp_remote_get($url, $args);

            if (is_wp_error($response)) {
                wp_send_json_error();
            }
            $body = wp_remote_retrieve_body($response);


            $perpage = $this->get_items_per_page('invoices_per_page', 10);
            $paged = isset($_REQUEST['paged']) ? (($this->get_pagenum() - 1) * $perpage) : 0;
            $data = json_decode($body, true);
            $totalitems = count($data);
            $this->set_pagination_args([
                'total_items' => $totalitems,
                'per_page' => $perpage
            ]);
            $this->items = array_slice($data, $paged, $perpage);
        } */
        //$this->_column_headers = $this->get_column_info();
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
    public function display_rows()
    {


        $payments = $this->items;

        if (!empty($payments)) {
            foreach ($payments as $inv) {
                $invoice_url = get_option('btcpw_btcpay_server_url') . '/invoices/' . $inv['invoice_id'];
                echo "<tr class=btcpw_invoices>";

                echo '</tr>';
                echo "<td data-colname=Id class=status column-status>{$inv['id']}</td>";
                echo "<td data-colname=Date class=status column-status>{$inv['date_created']}</td>";
                echo "<td data-colname=Content title class=status column-status>{$inv['page_title']}</td>";
                echo "<td data-colname=Content title class=status column-status>{$inv['revenue_type']}</td>";
                echo "<td data-colname=Status class={$inv['status']} status column-status>{$inv['status']}</td>";
                echo "<td data-colname=Method class={$inv['payment_method']} status column-status>{$inv['payment_method']}</td>";
                echo "<td data-colname=Amount class=status column-status>{$inv['amount']}</td>";
                echo "<td data-colname=Currency class=status column-status>{$inv['currency']}</td>";
                echo "<td data-colname=Invoice id class=status column-status><a href={$invoice_url} target=_blank>{$inv['invoice_id']}</a></td>";
                echo '</tr>';
            }
        }
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
            case 'date':
                return esc_html($item['date_created']);
            case 'blog':
                return esc_html($item['title_page']);
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

    /**
     * Generates custom table navigation to prevent conflicting nonces.
     * 
     * @param string $which The location of the bulk actions: 'top' or 'bottom'.
     */
    protected function display_tablenav($which)
    {
?>
        <div class="tablenav <?php echo esc_attr($which); ?>">
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
