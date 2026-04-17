import { InspectorControls } from "@wordpress/block-editor";
import {
	PanelBody,
	SelectControl,
} from "@wordpress/components";
import { COLOR_PRESETS } from "../color-presets.js";

export default function FullImageSettings({ attributes, setAttributes }) {
	const { imagePosition, colorPreset } = attributes;

	return (
		<InspectorControls>
			<PanelBody title="Layout Settings" initialOpen={true}>
				<SelectControl
					label="Image position"
					value={imagePosition}
					options={[
						{ label: "Image Right", value: "right" },
						{ label: "Image Left", value: "left" }
					]}
					onChange={(value) => setAttributes({ imagePosition: value })}
				/>
			</PanelBody>

			<PanelBody title="Color Preset" initialOpen={false}>
				<SelectControl
					label="Hero palette"
					value={colorPreset}
					options={Object.entries(COLOR_PRESETS).map(([key, val]) => ({
						label: val.label,
						value: key,
					}))}
					onChange={(value) => setAttributes({ colorPreset: value })}
				/>
			</PanelBody>
		</InspectorControls>
	);
}
