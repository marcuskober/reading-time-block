import { registerBlockType } from '@wordpress/blocks'
import { __ } from '@wordpress/i18n';
import edit from './edit';

registerBlockType('marcuskober/reading-time', {
    edit
});