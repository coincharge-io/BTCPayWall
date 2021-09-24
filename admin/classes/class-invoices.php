<?php
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}
class Invoices_Table extends WP_List_Table
{
    public $items;

    public function __construct()
    {
        parent::__construct([
            'singular' => __('Invoice', 'sd'),
            'plural'   => __('Invoices', 'sd'),
            'ajax'     => true
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
            'date' => __('Date'),
            'content_title'   => __('Content title'),
            'status'    => __('Status'),
            'amount'  => __('Amount'),
            'currency'    => __('Currency'),
            'id'    => __('Invoice id'),
        );
    }


    public function prepare_items()
    {
        $this->_column_headers = array($this->get_columns(), array(), array(), 'cb');

        $per_page = $this->get_items_per_page('invoices_per_page', 5);
        $current_page = $this->get_pagenum();
        //$total_items = count($this->items);

        $this->set_pagination_args([
            'total_items' => 5,
            'per_page' => $per_page
        ]);
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


            $data = json_decode($body, true);
            $this->items = $data;
            //var_dump($data);
            //wp_die();
        }
    }
    /**
     * Returns the count of invoices in the database.
     *
     * @return null|string
     */
    /*  public static function record_count()
    {
        return count($this->items);
    } */

    /**
     * Retrieve shortcode’s data from the database
     *
     * @param int $per_page
     * @param int $page_number
     *
     * @return mixed
     */
    /*  public static function get_invoices($per_page = 5, $page_number = 1)
    {

        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}btc_forms";

        if (!empty($_REQUEST['orderby'])) {
            $sql .= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
            $sql .= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
        }

        $sql .= " LIMIT $per_page";

        $sql .= ' OFFSET ' . ($page_number - 1) * $per_page;

        $result = $wpdb->get_results($sql, 'ARRAY_A');

        return $result;
    }
 */






    /**
     * Generates content for a single row of the table.
     * 
     * @param object $item The current item.
     * @param string $column_name The current column name.
     */
    protected function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'date':
                return esc_html(date('Y-m-d H:i:s', $item['createdTime']));
            case 'content_title':
                return esc_html($item['metadata']['itemDesc'] ?? null);
            case 'status':
                return esc_html($item['status']);
            case 'amount':
                return esc_html($item['amount']);
            case 'currency':
                return esc_html($item['currency']);
            case 'id':
                return esc_html($item['id']);
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
    /*  protected function column_status($item)
    {
        return sprintf(
            "<span class=%s></span>",
            $item['status']
        );
    } */
    /**
     * Generates content for a single row of the table.
     *
     * @param object $item The current item.
     */
    public function single_row($item)
    {
        echo '<tr>';
        $this->single_row_columns($item);
        echo '</tr>';
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


    public function display_rows()
    {

        $invoices = $this->items;


        list($columns, $hidden) = $this->get_column_info();
        if (!empty($invoices)) {

            foreach ($invoices as $inv) {
                $content_title = $inv['metadata']['itemDesc'] ?? null;
                $creationTime = date('Y-m-d H:i:s', $inv['createdTime']);
                echo "<tr class=btcpw_invoices>";
                foreach ($columns as $column_name => $column_display_name) {

                    echo "<td data-colname=Date class=status column-status>{$creationTime}</td>";
                    echo "<td data-colname=Content title class=status column-status>{$content_title}</td>";
                    echo "<td data-colname=Status class={$inv['status']} status column-status>{$inv['status']}</td>";
                    echo "<td data-colname=Amount class=status column-status>{$inv['amount']}</td>";
                    echo "<td data-colname=Currency class=status column-status>{$inv['currency']}</td>";
                    echo "<td data-colname=Id class=status column-status>{$inv['id']}</td>";
                    echo '</tr>';
                }
            }
        }
    }
}
new Invoices_Table();
