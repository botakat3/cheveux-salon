import { RichText, useBlockProps } from "@wordpress/block-editor";
import { COLOR_PRESETS } from "../color-presets.js";

export default function save({ attributes }) {
	const {
		eyebrow,
		title,
		text,
		imageUrl,
		imageAlt,
		imagePosition,
		colorPreset,
	} = attributes;

	const colors = COLOR_PRESETS[colorPreset] || COLOR_PRESETS.light

	const blockProps = useBlockProps.save({
		className: `about-hero about-hero--image-${imagePosition} about-hero--${colorPreset}`,
		style: {
			backgroundColor: colors.backgroundColor,
			color: colors.textColor,
		},
	});

	return (
		<section {...blockProps}>
			<div className="about-hero__content">
				<RichText.Content
					tagName="p"
					className="about-hero__eyebrow"
					value={eyebrow}
					style={{ color: colors.textColor }}
				/>

				<RichText.Content
					tagName="h2"
					className="about-hero__title"
					value={title}
					style={{ color: colors.headingColor}}
				/>

				<RichText.Content
					tagName="p"
					className="about-hero__text"
					value={text}
				/>
			</div>

			<div className="about-hero__image">
				{imageUrl && <img src={imageUrl} alt={imageAlt} />}
			</div>
		</section>
	);
}
