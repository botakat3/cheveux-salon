import {
	useBlockProps,
	RichText,
	MediaPlaceholder,
	MediaUploadCheck,
} from "@wordpress/block-editor";
import ContentBlockSettings from "./ContentBlockSettings.js";
import "./editor.scss";
import {COLOR_PRESETS} from "./color-presets.js";

export default function Edit({ attributes, setAttributes }) {
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

	const blockProps = useBlockProps({
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
		<>
			<ContentBlockSettings
				attributes={attributes}
				setAttributes={setAttributes}
			/>

			<section {...blockProps}>
				<div className="content-section__inner">
					{hasImage && (
						<div className="content-section__media">
							{imageUrl ? (
								<img src={imageUrl} alt={imageAlt} />
							) : (
								<MediaUploadCheck>
									<MediaPlaceholder
										icon="format-image"
										labels={{ title: "Content image" }}
										onSelect={(media) =>
											setAttributes({
												imageId: media?.id || 0,
												imageUrl: media?.url || "",
												imageAlt: media?.alt || "",
											})
										}
										allowedTypes={["image"]}
										accept="image/*"
									/>
								</MediaUploadCheck>
							)}
						</div>
					)}

					<div className="content-section__content">
						<RichText
							tagName="h2"
							className="content-section__title"
							value={title}
							onChange={(value) => setAttributes({ title: value })}
							placeholder="Section Title"
							style={{ color: colors.headingColor}}
						/>

						<RichText
							tagName="p"
							className="content-section__text"
							value={text}
							onChange={(value) => setAttributes({ text: value })}
							placeholder="Add your content here."
						/>
					</div>
				</div>
			</section>
		</>
	);
}
