const rearrangeBlockCategories = {
  "core/media-text": "custom",
  "core/columns": "custom",
};

wp.hooks.addFilter(
  "blocks.registerBlockType",
  "bulldozer",
  (settings, name) => {
    if (rearrangeBlockCategories[name]) {
      settings.category = rearrangeBlockCategories[name];
    }

    return settings;
  }
);
