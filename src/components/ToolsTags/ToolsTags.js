import React, { useState } from "react";
import "./ToolsTags.scss";

export default function ToolsTags({ tools, setTools }) {
	// local state for input
	const [newTool, setNewTool] = useState("");

	function addTool() {
		const trimmed = newTool.trim();

		if (!trimmed) return;
		if (tools.includes(trimmed)) return;

		setTools([...tools, trimmed]);
		setNewTool("");
	}

	function removeTool(toolToRemove) {
		setTools(tools.filter(tool => tool !== toolToRemove));
	}

	return (
		<div className="tools-section">
			<h3 className="tools-title">Tools Used</h3>

			<div className="tools-list">
				{tools.map(tool => (
					<span className="tool-pill" key={tool}>
						{tool}
						<button
							className="remove-btn"
							type="button"
							onClick={() => removeTool(tool)}
						>
							×
						</button>
					</span>
				))}
			</div>

			<div className="tools-input-row">
				<input
					type="text"
					placeholder="Add a tool..."
					value={newTool}
					onChange={(e) => setNewTool(e.target.value)}
					onKeyDown={(e) => e.key === "Enter" && addTool()}
				/>
				<button type="button" onClick={addTool}>Add</button>
			</div>
		</div>
	);
}
