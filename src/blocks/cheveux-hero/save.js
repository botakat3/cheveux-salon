import { RichText, useBlockProps } from "@wordpress/block-editor";

export default function save({ attributes }) {
	const { quote, title } = attributes;

	return (
		<section {...useBlockProps.save({ className: "cheveux-hero" })}>
			<div className="cheveux-hero__inner container">
					<RichText.Content
						tagName="p"
						className="cheveux-hero__quote"
						value={quote}
					/>


				<RichText.Content
					tagName="h1"
					className="cheveux-hero__title"
					value={title}
				/>



			</div>
		</section>
	);
}
