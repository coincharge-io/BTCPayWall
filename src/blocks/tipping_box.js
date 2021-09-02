import { registerBlockType } from "@wordpress/blocks";
import ServerSideRender from '@wordpress/server-side-render';
import {
  InspectorControls,
  MediaUpload,
  MediaPlaceholder,
  URLInputButton,
} from "@wordpress/block-editor";
import {
  TextControl,
  TextareaControl,
  ColorPicker,
  PanelBody,
  PanelRow,
  SelectControl,
  Button,
  Panel,
} from "@wordpress/components";

registerBlockType("btc-paywall/gutenberg-tipping-box", {
  title: "BP Tipping Box",
  icon: "dashicons-screenoptions",
  category: "widgets",
  keywords: ["tipping", "tipping-box"],
  attributes: {
    dimension: {
      type: "string",
      default: "250x300",
    },
    title: {
      type: "string",
      default: "Support my work",
    },
    description: {
      type: "string",
      default: "",
    },
    currency: {
      type: "string",
    },
    title_text_color: {
      type: "string",
    },
    tipping_text: {
      type: "string",
      default: "Enter Tipping Amount",
    },
    tipping_text_color: {
      type: "string",
    },
    background_image: {
      type: "string",
      default: "",
    },
    redirect: {
      type: "string",
    },
    description_color: {
      type: "string",
    },
    button_text: {
      type: "string",
      default: "Tipping now",
    },
    button_text_color: {
      type: "string",
    },
    button_color: {
      type: "string",
      default: "#FE642E"
    },
    input_background: {
      type: "string",
    },
    logo_id: {
      type: "string",
      default:'https://btcpaywall.com/wp-content/uploads/2021/07/BTCPayWall-logo_square.jpg'
    },
    background: {
      type: "string",
    },
    background_color: {
      type: "string",
    },
    background_id: {
      type: "string",
    },
  },
  example: {},
  edit: (props) => {
    const {
      attributes: {
        dimension,
        background_color,
        background,
        background_id,
        logo_id,
        input_background,
        button_color,
        button_text,
        button_text_color,
        description_color,
        redirect,
        title,
        title_text_color,
        tipping_text,
        tipping_text_color,
        description,
        background_image,
        currency,
      },
      setAttributes,
    } = props;
    
       const inspectorControls= (<InspectorControls>
          <Panel>
            <PanelBody title="Dimension" initialOpen={true}>
              <SelectControl
                value={dimension}
                onChange={(selectedItem) => {
                  setAttributes({ dimension: selectedItem });
                }}
                options={[
                  { value: "", label: "Default" },
                  { value: "250x300", label: "250x300" },
                  { value: "300x300", label: "300x300" },
                ]}
              />
            </PanelBody>
            <PanelBody title="Background">
              <MediaPlaceholder
                labels={{ title: "Background" }}
                onSelect={(el) => setAttributes({ background_id: el.url })}
                multiple={false}
                onSelectURL={(el) => setAttributes({ background_id: el })}
              />
              <ColorPicker
                color={background_color}
                onChangeComplete={(value) =>
                  setAttributes({ background_color: value.hex })
                }
                disableAlpha
              />
              <ColorPicker
                color={background}
                onChangeComplete={(value) =>
                  setAttributes({ background: value.hex })
                }
                disableAlpha
              />
            </PanelBody>
            <PanelBody title="Description">
              <MediaPlaceholder
                labels={{ title: "Logo" }}
                onSelect={(el) => setAttributes({ logo_id: el.url })}
                multiple={false}
                onSelectURL={(el) => setAttributes({ logo_id: el })}
              />

              <TextareaControl
                label="Title"
                help="Enter title"
                onChange={(content) => {
                  setAttributes({ title: content });
                }}
                value={title}
              />
              <ColorPicker
                color={title_text_color}
                onChangeComplete={(value) =>
                  setAttributes({ title_text_color: value.hex })
                }
                disableAlpha
              />

              <TextareaControl
                label="Description"
                help="Enter description"
                onChange={(content) => {
                  setAttributes({ description: content });
                }}
                value={description}
              />
              <ColorPicker
                color={description_color}
                onChangeComplete={(value) =>
                  setAttributes({ description_color: value.hex })
                }
                disableAlpha
              />

              <TextareaControl
                label="Tipping text"
                help="Enter tipping text"
                onChange={(content) => {
                  setAttributes({ tipping_text: content });
                }}
                value={tipping_text}
              />
              <ColorPicker
                color={tipping_text_color}
                onChangeComplete={(value) => setAttributes({ tipping_text_color: value.hex })}
                disableAlpha
              />

              <URLInputButton
                label="Redirect link"
                value={redirect}
                onChange={(value) => setAttributes({ redirect: value })}
              />

              <ColorPicker
                color={input_background}
                onChangeComplete={(value) =>
                  setAttributes({ input_background: value.hex })
                }
                disableAlpha
              />
              <SelectControl
                label="Currency"
                value={currency}
                onChange={(selectedItem) => {
                  setAttributes({ currency: selectedItem });
                }}
                options={[
                  { value: "", label: "Default" },
                  { value: "SATS", label: "SATS" },
                  { value: "BTC", label: "BTC" },
                  { value: "EUR", label: "EUR" },
                  { value: "USD", label: "USD" },
                ]}
              />
            </PanelBody>

            <PanelBody title="Button">
              <TextareaControl
                label="Button"
                help="Enter button text"
                onChange={(content) => {
                  setAttributes({ button_text: content });
                }}
                value={button_text}
              />
              <ColorPicker
                color={button_color}
                onChangeComplete={(value) =>
                  setAttributes({ button_color: value.hex })
                }
                disableAlpha
              />

              <ColorPicker
                color={button_text_color}
                onChangeComplete={(value) =>
                  setAttributes({ button_text_color: value.hex })
                }
                disableAlpha
              />
            </PanelBody>
          </Panel>
        </InspectorControls>
       );
       return [
         <div>
         <ServerSideRender block="btc-paywall/gutenberg-tipping-box" attributes={dimension, background_color,
        background,
        background_id,
        logo_id,
        input_background,
        button_color,
        button_text,
        button_text_color,
        description_color,
        redirect,
        title,
        title_text_color,
        tipping_text,
        tipping_text_color,
        description,
        currency}/>
         {inspectorControls}
         
         </div>
       ];
  },
  save: (props) => {
    return null;
  },
});
