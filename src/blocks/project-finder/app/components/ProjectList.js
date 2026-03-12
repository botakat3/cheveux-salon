import React from 'react';
import ProjectItem from "./ProjectItem.js";
export default function ProjectList({ items, loading }) {
	const skeletonItems = [1, 2, 3];
	const displayItems = loading ? skeletonItems : items;

	return (
		<div className="row row-cols-1 row-cols-md-1 g-4">
			<div className="col">
				{displayItems.map((item, index) => (
					<ProjectItem
						key={loading ? index : item.id}
						item={item}
						loading={loading}
					/>
				))}
			</div>
		</div>
	);
}
