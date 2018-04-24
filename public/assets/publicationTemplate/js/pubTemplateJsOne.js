var MessageArea = React.createClass({displayName: "MessageArea",
    handleTextChange: function(){
        var x = this.refs.messageBox.getDOMNode().value;
        
        if(x != ''){
            this.refs.messageBox.getDOMNode().className = 'active';
        } else {
            this.refs.messageBox.getDOMNode().className = '';
        }

        this.props.onUserInput('', '', x);
    },
    render: function(){
        return (
            React.createElement("div", {className: "control"}, 
                React.createElement("textarea", {id: "message", ref: "messageBox", placeholder: "What's on your mind ?", required: true, onChange: this.handleTextChange}), 
                React.createElement("label", {for: "message"}, "Contenu")
            )
        )
    }
});

var publicationForm = React.createClass({displayName: "publicationForm",
    getInitialState: function() {
        return {
            messageText: ''
        };
    },
    handleUserInput: function(messageText) {
        this.setState({
            messageText: messageText
        });
    },
  render: function(){
    return (
         React.createElement("form", {action: "/home#nouveautes"}, 
        
            React.createElement("fieldset", null, 
                React.createElement("legend", null, "Nouvelle Publication"), 
                
                React.createElement(MessageArea, {onUserInput: this.handleUserInput}), 
                
                React.createElement("input", {type: "submit", value: "Publier"})
            )

        )
        );
  }
});

React.render(React.createElement(publicationForm, null), document.getElementById('stage'));