import { AlignmentControl, BlockControls, InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components'
import { __ } from '@wordpress/i18n';
import { Fragment } from '@wordpress/element'

const edit = ({attributes, setAttributes}) => {
  const blockProps = useBlockProps();

  blockProps.className +=  ` has-text-align-${ attributes.textAlign }`;

  return (
    <Fragment>
      <InspectorControls>
        <PanelBody title={__('Settings', 'marcuskober/reading-time')} initialOpen={ true }>
          <TextControl
            label={__('Text template', 'marcuskober-reading-time')}
            value={attributes.textTemplate}
            onChange={value => setAttributes({textTemplate: value})}
          />

          <TextControl
            label={__('Words per minute', 'marcuskober-reading-time')}
            type="number"
            value={attributes.wordsPerMinute}
            onChange={value => setAttributes({wordsPerMinute: parseInt(value)})}
          />
        </PanelBody>
      </InspectorControls>
      <BlockControls group="block">
        <AlignmentControl
          value={ attributes.textAlign }
          onChange={value => {
            setAttributes({textAlign: value});
          }}
        />
      </BlockControls>
      <div { ...blockProps }>{ attributes.textTemplate }</div>
    </Fragment>
  );
};

export default edit;