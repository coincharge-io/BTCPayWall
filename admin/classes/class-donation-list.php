<?php
class Donation_List_Table extends WP_List_Table
{
    public $items = array(
        array(
            'id' => '1',
            'title' => 'Demo 1',
            'logo'  => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-Logo-lang.jpg',
            'description'   => 'This is a demo form',
            'tipping-text' => 'Enter Tipping Amount',
            'button-text' => 'Tip',
            'shortcode' => '[btcpw_tipping_box id=1]'
        ),
        array(
            'id' => '2',
            'title' => 'Demo 2',
            'logo'  => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-Logo-lang.jpg',
            'description'   => 'This is a demo form',
            'tipping-text' => 'Tip me',
            'button-text' => 'Tip',
            'shortcode' => '[btcpw_tipping_banner id=2]'
        ),
        array(
            'id' => '456',
            'title' => 'Demo 456',
            'logo'  => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-Logo-lang.jpg',
            'description'   => 'This is a demo form',
            'tipping-text' => 'Give me money',
            'button-text' => 'Tip',
            'shortcode' => '[btcpw_tipping_page id=456]'
        ),
        array(
            'id' => '667',
            'title' => 'Demo 667',
            'logo'  => 'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-Logo-lang.jpg',
            'description'   => 'This is a demo form',
            'tipping-text' => 'Enter Tipping Amount',
            'button-text' => 'Tip',
            'shortcode' => '[btcpw_tipping_box id=667]'
        )
    );
    /**
     * Get a list of columns.
     *
     * @return array
     */
    public function get_columns()
    {
        return array(
            'cb'      => '<input type="checkbox" />',
            'title'   => wp_strip_all_tags(__('Title')),
            'logo'    => wp_strip_all_tags(__('Logo')),
            'description'  => wp_strip_all_tags(__('Description')),
            'tipping-text'    => wp_strip_all_tags(__('Tipping text')),
            'button-text'    => wp_strip_all_tags(__('Button text')),
            'shortcode'      => wp_strip_all_tags(__('Shortcode')),
        );
    }

    /**
     * Prepares the list of items for displaying.
     */
    public function prepare_items()
    {
        $columns  = $this->get_columns();
        $hidden   = array();
        $sortable = array();
        $primary  = 'cb';
        $this->_column_headers = array($columns, $hidden, $sortable, $primary);
    }
    protected function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="%1$s[]" value="%2$s" />',
            $this->_args['singular'],
            $item['id']
        );
    }
    protected function column_logo($item)
    {
        return sprintf(
            '<img width=60 height=60 src="%s" />',
            $item['logo']
        );
    }


    protected function get_bulk_actions()
    {
        $actions = array(
            'delete'    => 'Delete',
            'trash'    => 'Move To Trash'
        );
        return $actions;
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
            case 'cb':
                return esc_html($item['cb']);
            case 'title':
                return esc_html($item['title']);
            case 'logo':
                return esc_html($item['logo']);
            case 'description':
                return esc_html($item['description']);
            case 'tipping-text':
                return esc_html($item['tipping-text']);
            case 'button-text':
                return esc_html($item['button-text']);
            case 'shortcode':
                return esc_html($item['shortcode']);
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
}
new Donation_List_Table();
