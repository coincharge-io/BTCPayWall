import { registerBlockType } from "@wordpress/blocks";
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
  CheckboxControl,
  __experimentalNumberControl as NumberControl,
} from "@wordpress/components";
import ServerSideRender from '@wordpress/server-side-render';

registerBlockType("btc-paywall/gutenberg-tipping-banner-high", {
  title: "BP Tipping Banner High",
  icon: "dashicons-screenoptions",
  category: "widgets",
  keywords: ["tipping", "tipping-banner-high"],
  attributes: {
    dimension: {
      type: "string",
      default: "200x710",
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
    value1_enabled: {
      type: "boolean",
      default: true,
    },
    value1_amount: {
      type: "number",
      default: 1000,
    },
    value1_currency: {
      type: "string",
      default: "SATS",
    },
    value1_icon: {
      type: "string",
      default: "fas fa-coffee",
    },
    value2_enabled: {
      type: "boolean",
      default: true,
    },
    value2_amount: {
      type: "number",
      default: 2000,
    },
    value2_currency: {
      type: "string",
      default: "SATS",
    },
    value2_icon: {
      type: "string",
      default: "fas fa-beer",
    },
    value3_enabled: {
      type: "boolean",
      default: true,
    },
    value3_amount: {
      type: "number",
      default: 3000,
    },
    value3_currency: {
      type: "string",
      default: "SATS",
    },
    value3_icon: {
      type: "string",
      default: "fas fa-cocktail",
    },
    display_name: {
      type: "boolean",
      default: false,
    },
    mandatory_name: {
      type: "boolean",
      default: false,
    },
    display_email: {
      type: "boolean",
      default: true,
    },
    mandatory_email: {
      type: "boolean",
      default: false,
    },
    display_address: {
      type: "boolean",
      default: true,
    },
    mandatory_address: {
      type: "boolean",
      default: false,
    },
    display_phone: {
      type: "boolean",
      default: true,
    },
    mandatory_phone: {
      type: "boolean",
      default: false,
    },
    display_message: {
      type: "boolean",
      default: true,
    },
    mandatory_message: {
      type: "boolean",
      default: false,
    },
    free_input: {
      type: "boolean",
      default: true,
    },
    show_icon: {
      type: "boolean",
      default: true,
    },
  },
  example: {},
  edit: (props) => {
    const {
      attributes: {
        dimension,
        background,
        background_id,
        background_color,
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
        currency,
        value1_amount,
        value1_currency,
        value1_enabled,
        value1_icon,
        value2_amount,
        value2_currency,
        value2_enabled,
        value2_icon,
        value3_amount,
        value3_currency,
        value3_enabled,
        value3_icon,
        display_name,
        display_email,
        display_message,
        display_phone,
        display_address,
        mandatory_address,
        mandatory_email,
        mandatory_phone,
        mandatory_message,
        mandatory_name,
        free_input,
        show_icon
      },
      setAttributes,
    } = props;
    
    const inspectorControls= (
        <InspectorControls>
          <Panel>
            <PanelBody title="Dimension" initialOpen={true}>
              <SelectControl
                value={dimension}
                onChange={(selectedItem) => {
                  setAttributes({ dimension: selectedItem });
                }}
                options={[
                  { value: "200x710", label: "Default" },
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
                onChangeComplete={(value) =>
                  setAttributes({ tipping_text_color: content })
                }
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
              <CheckboxControl
                label="Display free input"
                help="Do you want to display free input field?"
                checked={free_input}
                onChange={(newvalue) => setAttributes({ free_input: newvalue })
                  }
              />
              
              <CheckboxControl
                label="Display icons"
                help="Do you want to display icons?"
                checked={show_icon}
                onChange={(newvalue) => setAttributes({ show_icon: newvalue })
                }
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
            <PanelBody title="Amount">
              
              <CheckboxControl
								label="Display value 1"
                help="Do you want to display value 1?"
								checked={value1_enabled}
								onChange={(newval) => 
                  setAttributes({ value1_enabled: newval })
                }
							/>
              <SelectControl
                value={value1_currency}
                onChange={(selectedItem) => {
                  setAttributes({ value1_currency: selectedItem });
                }}
                options={[
                  { value: "", label: "Default" },
                  { value: "SATS", label: "SATS" },
                  { value: "BTC", label: "BTC" },
                  { value: "EUR", label: "EUR" },
                  { value: "USD", label: "USD" },
                ]}
              />
              <NumberControl
                isShiftStepEnabled={true}
                onChange={(amount) => {
                  setAttributes({ value1_amount: amount });
                }}
                shiftStep={10}
                value={value1_amount}
              />
              <TextControl
                label="FA Icon class"
                value={value1_icon}
                onChange={(value) => setAttributes({ value1_icon: value })}
              />

              <CheckboxControl
                label="Display value 2"
                help="Do you want to display value 2?"
                checked={value2_enabled}
                onChange={(value) => {
                  setAttributes({ value2_enabled: value });
                }}
              />
              <SelectControl
                value={value2_currency}
                onChange={(selectedItem) => {
                  setAttributes({ value2_currency: selectedItem });
                }}
                options={[
                  { value: "", label: "Default" },
                  { value: "SATS", label: "SATS" },
                  { value: "BTC", label: "BTC" },
                  { value: "EUR", label: "EUR" },
                  { value: "USD", label: "USD" },
                ]}
              />
              <NumberControl
                isShiftStepEnabled={true}
                onChange={(amount) => {
                  setAttributes({ value2_amount: amount });
                }}
                shiftStep={10}
                value={value2_amount}
              />
              <TextControl
                label="FA Icon class"
                value={value2_icon}
                onChange={(value) => setAttributes({ value2_icon: value })}
              />

              <CheckboxControl
                label="Display value 3"
                help="Do you want to display value 3?"
                checked={value3_enabled}
                onChange={(value) => {
                  setAttributes({ value3_enabled: value })
                }}
              />
              <SelectControl
                value={value3_currency}
                onChange={(selectedItem) => {
                  setAttributes({ value3_currency: selectedItem });
                }}
                options={[
                  { value: "", label: "Default" },
                  { value: "SATS", label: "SATS" },
                  { value: "BTC", label: "BTC" },
                  { value: "EUR", label: "EUR" },
                  { value: "USD", label: "USD" },
                ]}
              />
              <NumberControl
                isShiftStepEnabled={true}
                onChange={(amount) => {
                  setAttributes({ value3_amount: amount });
                }}
                shiftStep={10}
                value={value3_amount}
              />
              <TextControl
                label="FA Icon class"
                value={value3_icon}
                onChange={(value) => setAttributes({ value3_icon: value })}
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
            <PanelBody title="Collect further information">
              <PanelRow>
                <CheckboxControl
                  label="Full name"
                  help="Do you want to collect full name?"
                  checked={display_name}
                  onChange={(value) => {
                    setAttributes({ display_name: value });
                  }}
                />
                <CheckboxControl
                  help="Do you want make this field mandatory?"
                  checked={mandatory_name}
                  onChange={(value) => {
                    setAttributes({ mandatory_name: value });
                  }}
                />
              </PanelRow>
              <PanelRow>
                <CheckboxControl
                  label="Email"
                  help="Do you want to collect email?"
                  checked={display_email}
                  onChange={(value) => {
                    setAttributes({ display_email: value });
                  }}
                />
                <CheckboxControl
                  help="Do you want make this field mandatory?"
                  checked={mandatory_email}
                  onChange={(value) => {
                    setAttributes({ mandatory_email: value });
                  }}
                />
              </PanelRow>
              <PanelRow>
                <CheckboxControl
                  label="Address"
                  help="Do you want to collect address?"
                  checked={display_address}
                  onChange={(value) => {
                    setAttributes({ display_address: value });
                  }}
                />
                <CheckboxControl
                  help="Do you want make this field mandatory?"
                  checked={mandatory_address}
                  onChange={(value) => {
                    setAttributes({ mandatory_address: value });
                  }}
                />
              </PanelRow>
              <PanelRow>
                <CheckboxControl
                  label="Phone"
                  checked={display_phone}
                  help="Do you want to collect phone?"
                  onChange={(value) => 
                    setAttributes({ display_phone: value })
                  }
                />
                <CheckboxControl
                  help="Do you want make this field mandatory?"
                  checked={mandatory_phone}
                  onChange={(value) => {
                    setAttributes({ mandatory_phone: value });
                  }}
                />
              </PanelRow>
              <PanelRow>
                <CheckboxControl
                  label="Message"
                  help="Do you want to collect message?"
                  checked={display_message}
                  onChange={(value) => {
                    setAttributes({ display_message: value });
                  }}
                />
                <CheckboxControl
                  help="Do you want make this field mandatory?"
                  checked={mandatory_message}
                  onChange={(value) => {
                    setAttributes({ mandatory_message: value });
                  }}
                />
              </PanelRow>
            </PanelBody>
          </Panel>
        </InspectorControls>);
        return [
         <div>
         <ServerSideRender block="btc-paywall/gutenberg-tipping-banner-high" attributes={dimension, background_color, background, background_id, logo_id, input_background, button_color, button_text, button_text_color, description_color, redirect, title, title_text_color, tipping_text, tipping_text_color, description, currency, value1_amount, value1_currency, value1_enabled, value1_icon, value2_amount, value2_currency, value2_enabled,
        value2_icon, value3_amount, value3_currency, value3_enabled, value3_icon, display_name, display_email, display_message, display_phone, display_address, mandatory_address, mandatory_email, mandatory_phone, mandatory_message, mandatory_name, free_input, show_icon}/>
         {inspectorControls}
         
         </div>
       ];
  },
  save: (props) => {
    return null;
  },
});
