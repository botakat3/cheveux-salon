import React from "react";
import {InspectorControls} from "@wordpress/block-editor";
import {ColorPalette, ColorPicker, PanelBody, PanelRow, SelectControl, ToggleControl} from "@wordpress/components";

export default function BlockSettings({attributes, setAttributes}) {
	return (
		<InspectorControls>
			<PanelBody title="Basic Styling" initialOpen={true}>
				<PanelRow>
					Button Color
				</PanelRow>
				<PanelRow>
					<ColorPalette
						colors={[
							{name:'Accent', color: '#000'},
							{name:'Blue', color: '#C2D6F1'},
						]}
						value={attributes.buttonColor}
						onChange={buttonColor => setAttributes({ buttonColor })}
						disableCustomColors={true}
					/>
				</PanelRow>
				<PanelRow>
					<SelectControl
						label="Theme Mode"
						value={attributes.themeMode}
						onChange={(themeMode) => setAttributes({ themeMode })}
						options={[
							{ value: "dark", label: "Dark" },
							{ value: "light", label: "Light" },
						]}
					/>
				</PanelRow>

			</PanelBody>
			<PanelBody title="Layout" initialOpen={true}>
				<PanelRow>
					<ToggleControl
						label="Swap Left/Right Sides"
						checked={!!attributes.layoutFlip}
						onChange={(layoutFlip) => setAttributes({ layoutFlip })}
					/>
				</PanelRow>
			</PanelBody>
		</InspectorControls>
	)
}
