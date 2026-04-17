import { RichText, useBlockProps } from "@wordpress/block-editor";
import {COLOR_PRESETS} from "../color-presets.js";

export default function save({ attributes }) {
	const {
		hasImage,
		imagePosition,
		imageUrl,
		imageAlt,
		title,
		text,
		colorPreset
	} = attributes;

	const colors = COLOR_PRESETS[colorPreset] || COLOR_PRESETS.light;

	const blockProps = useBlockProps.save({
		className: `content-section ${
			hasImage
				? `content-section--image-${imagePosition}`
				: "content-section--text-only"
		} content-section--${colorPreset}`,
		style: {
			backgroundColor: colors.backgroundColor,
			color: colors.textColor,
		},
	});

	return (
		<section {...blockProps}>
			<div className="content-section__inner">

				{/* IMAGE */}
				{hasImage && imageUrl && (
					<div className="content-section__media">
						<img src={imageUrl} alt={imageAlt} />
					</div>
				)}

				{/* TEXT CONTENT */}
				<div className="content-section__content">
					<RichText.Content
						tagName="h2"
						className="content-section__title"
						value={title}
						style={{ color: colors.headingColor}}
					/>

					<RichText.Content
						tagName="p"
						className="content-section__text"
						value={text}
					/>
				</div>

			</div>
		</section>
	);
}
