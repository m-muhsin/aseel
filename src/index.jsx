import React from 'react';
import ReactDOM from 'react-dom';
var LoadingIcon = require('./Loading_icon.gif');

// Load the CSS
require('./style.scss');

class Posts extends React.Component {
    constructor(props) {
        super(props);
        this.handleButtonClick = this.handleButtonClick.bind(this);
        this.state = {
            posts: {},
            page: 0
        }
    }

    componentDidMount() {
        var that = this;

        // init controller
        var controller = new ScrollMagic.Controller();

        // build scene
        var scene = new ScrollMagic.Scene({ triggerElement: "#posts-here", triggerHook: "onEnter" })
            .addTo(controller)
            .on("enter", function (e) {
                that.handleButtonClick();
            });
    }

    handleButtonClick() {
        // adding a loader
        jQuery("#loader").addClass("active");
        this.setState({ page: this.state.page + 1 });
        jQuery.getJSON("http://localhost/mtwoblog/wp-json/wp/v2/posts/?page=" + this.state.page, function (result) {

            jQuery.each(result, function (i, field) {
                jQuery(".posts-container").
                    append("<article class='post-excerpt'><a href='" + field.link + "'><h2>" + field.title.rendered + "</h2></a><p>" + field.excerpt.rendered + "</p></article>");
            });
            if (result[0] == null) {
                jQuery("#loader").remove();
            }
            // removing loader
            jQuery("#loader").removeClass("active");


            var controller2 = new ScrollMagic.Controller();
            // loop through each .posts-container .post-excerpt element
            jQuery('.posts-container .post-excerpt').each(function () {

                // build a scene
                var ourScene2 = new ScrollMagic.Scene({
                    triggerElement: this.children[0],
                    reverse: false,
                    triggerHook: 1
                })
                    .setClassToggle(this, 'fade-in') // add class to project01
                    .addTo(controller2);
            });
        });
    }

    render() {
        return (
            <div>
                <div className="posts-container"></div>
                <div id="posts-here"></div>
                <div id="loader">
                    <img src={LoadingIcon} />
                </div>
            </div>
        )
    }
}

ReactDOM.render(<Posts />, document.getElementById('app-container'));