const { blocks, editor, element } = window.wp;
const { RichText } = editor;

const categories = blocks.getCategories();
if (!categories.find(category => category.slug === 'wordplate')) {
  categories.push({slug: 'wordplate', title: 'Wordplate'});
  blocks.setCategories(categories);
}

blocks.registerBlockType('wordplate/my-block', {
  title: 'My Block',
  icon: 'universal-access-alt',
  category: 'wordplate',

  attributes: {
    content: {
      type: 'array',
      source: 'children',
      selector: 'p',
    },
  },

  edit: (props) =>{
    return (
      <div className={props.className}>
        <RichText
          tagName="p"
          value={props.attributes.content}
          onChange={content => props.setAttributes({ content })}
        />
      </div>
    );
  },

  save: (props) => {
    return (
      <div className={props.className}>
        <RichText.Content
          tagName="p"
          value={props.attributes.content}
        />
      </div>
    );
  },
});
