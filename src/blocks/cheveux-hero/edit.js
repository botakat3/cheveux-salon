import {
	RichText,
	URLInputButton,
	useBlockProps,
} from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	const { quote, title } = attributes;
	const blockProps = useBlockProps({
		className: "cheveux-hero",
	});

	return (
		<section {...blockProps}>
			<div className="cheveux-hero__inner container">
					<RichText
						tagName="p"
						className="cheveux-hero__quote"
						value={quote}
						onChange={(value) => setAttributes({ quote: value })}
						placeholder="Salon"
					/>


				<RichText
					tagName="h1"
					className="cheveux-hero__title"
					value={title}
					onChange={(value) => setAttributes({ title: value })}
					placeholder="CHEVEUX"
				/>


			</div>
		</section>
	);
}
