import {
	useBlockProps,
	RichText,
	MediaPlaceholder,
	MediaUploadCheck,
	MediaUpload,
	URLInputButton, InnerBlocks,
} from "@wordpress/block-editor";
import { Button } from "@wordpress/components";
import ContentBlockSettings from "./ContentBlockSettings.js";
import "./editor.scss";
import { COLOR_PRESETS } from "../color-presets.js";

export default function Edit({ attributes, setAttributes }) {
	const {
		hasImage,
		imagePosition,
		imageUrl,
		imageAlt,
		imageId,
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

	const ALLOWED_BLOCKS = [
		"core/paragraph",
		"core/heading",
		"core/list",
		"core/buttons",
		"core/button",
		"core/spacer",
		"core/html",
		"formidable/simple-form",
	];

	const TEMPLATE = [
		["core/paragraph", { placeholder: "Add extra content..." }],
	];
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
								<>
									<img src={imageUrl} alt={imageAlt} />

									<div className="content-section__image-actions">
										<MediaUploadCheck>
											<MediaUpload
												onSelect={(media) =>
													setAttributes({
														imageId: media?.id || 0,
														imageUrl: media?.url || "",
														imageAlt: media?.alt || "",
													})
												}
												allowedTypes={["image"]}
												render={({ open }) => (
													<Button onClick={open} variant="secondary">
														Replace Image
													</Button>
												)}
											/>
										</MediaUploadCheck>

										<Button
											variant="link"
											isDestructive
											onClick={() =>
												setAttributes({
													imageId: 0,
													imageUrl: "",
													imageAlt: "",
												})
											}
										>
											Remove Image
										</Button>
									</div>
								</>
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
							{showCircleText && (
							<div className={`circle-text circle-text--${circlePosition}`}>
								<svg viewBox="0 0 200 200">
									<path
										id="circlePath"
										d="M 100,100 m -85,0 a 85,85 0 1,1 170,0 a 85,85 0 1,1 -170,0"
										fill="none"
									/>
									<text style={{ fill: colors.headingColor }}>
										<textPath href="#circlePath">
											KEEPING HAIR HEALTHY • ONE STRAND AT A TIME •
										</textPath>
									</text>
								</svg>
							</div>
								)}
						</div>
					)}

					<div className="content-section__content">

						<RichText
							tagName="p"
							className="content-section__eyebrow"
							value={eyebrow}
							onChange={(value) => setAttributes({eyebrow: value})}
							placeholder="Add text here.."
							style={{color: colors.textColor}}
						/>

						<RichText
							tagName="h2"
							className="content-section__title"
							value={title}
							onChange={(value) => setAttributes({title: value})}
							placeholder="Section Title"
							style={{color: colors.headingColor}}
							allowedFormats={[
								'core/bold',
								'core/italic'
							]}
						/>

						<RichText
							tagName="p"
							className="content-section__text"
							value={text}
							onChange={(value) => setAttributes({text: value})}
							placeholder="Add your content here."
							allowedFormats={[
								'core/bold',
								'core/italic',
								'core/link',
							]}
						/>

						{hasButton && (
							<div className="cheveux-button-wrap"
							>
								<div className="cheveux-button" role="button">
									<RichText
										tagName="span"
										value={buttonText}
										onChange={(value) => setAttributes({buttonText: value})}
										placeholder="Button text"
										allowedFormats={[]}

									/>
								</div>

								<URLInputButton
									url={buttonUrl}
									onChange={(url) => setAttributes({buttonUrl: url})}
								/>
							</div>
						)}

						<div className="content-section__innerblocks">
							<InnerBlocks
								allowedBlocks={ALLOWED_BLOCKS}
								template={TEMPLATE}
								templateLock={false}
							/>
						</div>
					</div>
				</div>
			</section>
		</>
	);
}
