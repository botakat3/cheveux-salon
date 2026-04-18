import {
	useBlockProps,
	RichText,
	MediaPlaceholder,
	MediaUpload,
	MediaUploadCheck,
} from "@wordpress/block-editor";
import { Button } from "@wordpress/components";
import { COLOR_PRESETS } from "../color-presets.js";
import "./editor.scss";
import FullImageSettings from "./FullImageSettings";

export default function Edit({ attributes, setAttributes }) {
	const {
		eyebrow,
		title,
		text,
		imageId,
		imageUrl,
		imageAlt,
		imagePosition,
		colorPreset,
	} = attributes;

	const colors = COLOR_PRESETS[colorPreset] || COLOR_PRESETS.light;

	const blockProps = useBlockProps({
		className: `about-hero about-hero--image-${imagePosition} about-hero--${colorPreset}`,
		style: {
			backgroundColor: colors.backgroundColor,
			color: colors.textColor,
		},
	});

	return (
		<>
			<FullImageSettings
				attributes={attributes}
				setAttributes={setAttributes}
			/>

			<section {...blockProps}>
				<div className="about-hero__content">
					<RichText
						tagName="p"
						className="about-hero__eyebrow"
						value={eyebrow}
						onChange={(value) => setAttributes({ eyebrow: value })}
						placeholder="About Cheveux"
						style={{ color: colors.textColor }}
					/>

					<RichText
						tagName="h2"
						className="about-hero__title"
						value={title}
						onChange={(value) => setAttributes({ title: value })}
						placeholder="Effortless beauty with an elevated touch."
						style={{ color: colors.headingColor}}
					/>

					<RichText
						tagName="p"
						className="about-hero__text"
						value={text}
						onChange={(value) => setAttributes({ text: value })}
						placeholder="Create a short introduction here."
					/>
				</div>

				<div className="about-hero__image">
					{imageUrl ? (
						<>
							<img src={imageUrl} alt={imageAlt} />

							<div className="about-hero__image-actions">
								<MediaUploadCheck>
									<MediaUpload
										allowedTypes={["image"]}
										value={imageId}
										onSelect={(media) =>
											setAttributes({
												imageId: media?.id || 0,
												imageUrl: media?.url || "",
												imageAlt: media?.alt || "",
											})
										}
										render={({ open }) => (
											<Button variant="secondary" onClick={open}>
												Replace image
											</Button>
										)}
									/>

								</MediaUploadCheck>


							</div>
						</>
					) : (
						<MediaUploadCheck>
							<MediaPlaceholder
								icon="format-image"
								labels={{ title: "Hero image" }}
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
			</section>
		</>
	);
}
