(function() {
  "use strict";
  function writerMarks(Vue) {
    const thirdParty = window.panel.plugins.thirdParty;
    if (thirdParty.__marksInitialized)
      return;
    const customMarks = thirdParty.marks;
    if (!customMarks)
      return;
    const original = Vue.component("k-writer");
    Vue.component("k-writer", {
      extends: original,
      methods: {
        createMarks() {
          const originalMarks = original.options.methods.createMarks.call(this).filter(({ name }) => !Object.keys(customMarks).includes(name));
          const marks = Object.entries(customMarks).reduce(
            (acc, [key, Constructor]) => {
              acc[key] = new Constructor();
              return acc;
            },
            {}
          );
          return [...originalMarks, ...this.filterExtensions(marks, this.marks)];
        }
      }
    });
    thirdParty.__marksInitialized = true;
  }
  class Extension {
    constructor(options = {}) {
      this.options = {
        ...this.defaults,
        ...options
      };
    }
    init() {
      return null;
    }
    bindEditor(editor = null) {
      this.editor = editor;
    }
    get name() {
      return null;
    }
    get type() {
      return "extension";
    }
    get defaults() {
      return {};
    }
    plugins() {
      return [];
    }
    inputRules() {
      return [];
    }
    pasteRules() {
      return [];
    }
    keys() {
      return {};
    }
  }
  class Mark extends Extension {
    constructor(options = {}) {
      super(options);
    }
    command() {
      return () => {
      };
    }
    remove() {
      this.editor.removeMark(this.name);
    }
    get schema() {
      return null;
    }
    get type() {
      return "mark";
    }
    toggle() {
      return this.editor.toggleMark(this.name);
    }
    update(attrs) {
      this.editor.updateMark(this.name, attrs);
    }
  }
  class Footnote extends Mark {
    get button() {
      return {
        icon: "quote",
        label: "Footnote"
      };
    }
    commands() {
      return () => this.toggle();
    }
    get name() {
      return "footnote";
    }
    get schema() {
      return {
        parseDOM: [{ tag: "article-footnote" }],
        toDOM: (node) => [
          "article-footnote",
          {
            ...node.attrs
          },
          0
        ]
      };
    }
  }
  window.panel.plugin("johannschopplich/kirby-writer-marks", {
    use: [writerMarks],
    thirdParty: {
      marks: {
        ...window.panel.plugins.thirdParty.marks || {},
        footnote: Footnote
      }
    }
  });
})();
