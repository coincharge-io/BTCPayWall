import { withSelect } from '@wordpress/data'
import { registerBlockType } from '@wordpress/blocks'
import apiFetch from '@wordpress/api-fetch'
import ServerSideRender from '@wordpress/server-side-render'
import { useDispatch, useSelect } from '@wordpress/data'
import { InspectorControls } from '@wordpress/block-editor'
import './shortcode_store'
import {
  PanelBody,
  PanelRow,
  SelectControl,
  Panel
} from '@wordpress/components'
registerBlockType('btcpaywall/gutenberg-shortcode-list', {
  title: 'BTCPW Shortcode List',
  icon: 'dashicons-screenoptions',
  category: 'widgets',
  keywords: ['paywall', 'shortcode-list'],
  attributes: {
    className: {
      type: 'string',
      default: ''
    },
    shortcode: {
      type: 'string',
      default: ''
    }
  },
  edit: props => {
    const {
      attributes: { shortcode },
      setAttributes
    } = props
    const shortcodes = useSelect(select =>
      select('btcpaywall/shortcode_data').getShortcodeList()
    )
    return (
      <div>
        <InspectorControls>
          <Panel>
            <PanelBody title='Shortcodes' initialOpen={true}>
              <div className='btcpw_gutenberg_sel_num_control'>
                <SelectControl
                  value={shortcode}
                  onChange={selectedItem => {
                    setAttributes({ shortcode: selectedItem })
                  }}
                  options={Object.entries(shortcodes).map(pair => ({
                    label: pair[0],
                    value: pair[1]
                  }))}
                />
              </div>
            </PanelBody>
          </Panel>
        </InspectorControls>
      </div>
    )
  },
  save: props => {
    return null
  }
})
