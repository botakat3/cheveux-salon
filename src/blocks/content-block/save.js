import {RichText, useBlockProps, InnerBlocks} from "@wordpress/block-editor";
import {COLOR_PRESETS} from "../color-presets.js";

export default function save({ attributes }) {
	const {
		hasImage,
		imagePosition,
		imageUrl,
		imageAlt,
		eyebrow,
		title,
		text,
		colorPreset,
		hasButton,
		buttonText,
		buttonUrl,
		showCircleText,
		circlePosition
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


				{hasImage && imageUrl && (
					<div className="content-section__media">
						<img src={imageUrl} alt={imageAlt}/>

						{showCircleText && (

							<div className={`circle-text circle-text--${circlePosition}`}>
							<svg viewBox="0 0 200 200">
								<path
									id="circlePath"
									d="M 100,100 m -85,0 a 85,85 0 1,1 170,0 a 85,85 0 1,1 -170,0"
									fill="none"
								/>

								<text style={{fill: colors.headingColor}}>
									<textPath href="#circlePath">
										KEEPING HAIR HEALTHY • ONE STRAND AT A TIME •
									</textPath>
								</text>
							</svg>
						</div>
							)}
						</div>
				)}

				{/* TEXT CONTENT */}
				<div className="content-section__content">
					<RichText.Content
						tagName="p"
						className="content-section__eyebrow"
						value={eyebrow}
						style={{color: colors.textColor}}
					/>

					<RichText.Content
						tagName="h2"
						className="content-section__title"
						value={title}
						style={{color: colors.headingColor}}
					/>

					<RichText.Content
						tagName="p"
						className="content-section__text"
						value={text}
					/>

					{hasButton && buttonText && buttonUrl && (
						<div className="cheveux-button-wrap">
							<a className="cheveux-button"
							   href={buttonUrl}
								// target="_blank"
							   rel="noopener noreferrer">
								<RichText.Content tagName="span" value={buttonText}/>
							</a>
						</div>
					)}


					<div className="content-section__innerblocks">
						<InnerBlocks.Content/>
					</div>
				</div>

			</div>
		</section>
	);
}
