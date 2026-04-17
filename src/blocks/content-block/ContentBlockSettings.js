import { InspectorControls } from "@wordpress/block-editor";
import {
	PanelBody,
	ToggleControl,
	SelectControl,
} from "@wordpress/components";

import { COLOR_PRESETS } from "./color-presets.js";

export default function ContentBlockSettings({ attributes, setAttributes }) {
	const {
		hasImage,
		imagePosition,
		colorPreset,
	} = attributes;

	return (
		<InspectorControls>
			<PanelBody title="Color Preset" initialOpen={false}>
				<SelectControl
					label="Section palette"
					value={colorPreset}
					options={Object.entries(COLOR_PRESETS).map(([key, val]) => ({
						label: val.label,
						value: key,
					}))}
					onChange={(value) => setAttributes({ colorPreset: value })}
				/>
			</PanelBody>

			<PanelBody title="Layout Settings" initialOpen={true}>
				<ToggleControl
					label="Show image"
					checked={hasImage}
					onChange={(value) => setAttributes({ hasImage: value })}
				/>

				{hasImage && (
					<SelectControl
						label="Image position"
						value={imagePosition}
						options={[
							{ label: "Image Left", value: "left" },
							{ label: "Image Right", value: "right" },
						]}
						onChange={(value) => setAttributes({ imagePosition: value })}
					/>
				)}
			</PanelBody>
		</InspectorControls>
	);
}
