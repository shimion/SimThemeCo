$.fn.wysiwygEditor = function() {

  'use strict'

  var textarea = this;

  var randomID = 'wysiwygEditor-' + Math.floor(Math.random() * 1000000);
var actions = [
  {
    title: 'undo'
  },
  {
    title: 'repeat',
    action: 'redo',
    break: true
  },
  {
    title: 'bold',
    nodeName: 'B'
  },
  {
    title: 'italic',
    nodeName: 'I'
  },
  {
    title: 'underline',
    nodeName: 'U',
    break: true
  },
  {
    title: 'align-left',
    action: 'justifyLeft',
    nodeName: 'left'
  },
  {
    title: 'align-center',
    action: 'justifyCenter',
    nodeName: 'center'
  },
  {
    title: 'align-right',
    action: 'justifyRight',
    nodeName: 'right'
  },
  {
    title: 'align-justify',
    action: 'justifyFull',
    nodeName: 'justify',
    break: true
  },
  {
    title: 'list-ol',
    action: 'insertOrderedList',
    nodeName: 'OL'
  },
  {
    title: 'list-ul',
    action: 'insertUnorderedList',
    nodeName: 'UL',
    break: true
  },
  {
    title: 'link',
    action: 'createLink',
    nodeName: 'A',
    value: true,
    desc: 'Insert link URL'
  },
  {
    title: 'image',
    action: 'insertImage',
    value: true,
    desc: 'Insert image URL',
  }
];
  
  var markup = function (randomID, actions) {

  var markup = '';

  markup += '<div id="' + randomID + '" class="wysiwygEditor-wrapper">';
  markup +=   '<div class="wysiwygEditor-toolbar">';
  markup +=     '<ul>';

  // Display all tools
  $.each(actions, function(i) {
    markup +=       '<li>';
    markup +=         '<a href class="wysiwygEditor-' + actions[i].title + '" title="' + actions[i].title.toUpperCase() + '">';
    markup +=           '<i class="fa fa-' + actions[i].title + '"></i>';
    markup +=        '</a>';
    markup +=       '</li>';

    // Break
    if(typeof(actions[i].break) != 'undefined') {
      markup +=     '<li class="break">|</li>'
    }
  });

  markup +=     '</ul>';
  markup +=   '</div>';
  markup +=   '<div class="wysiwygEditor-editArea">';
  markup +=     '<iframe src="about:blank" height="300"></iframe>';
  markup +=   '</div>';
  markup +=   '<div class="wysiwygEditor-footer">';
  markup +=   'HTML';
  markup +=   '</div>';
  markup += '</div>';

  return markup;

};
    
  var iframeLoaded = function(element, callback) {

  var loop = true;

  while(loop) {
    if($(element).length) {
      $($(element)[0].contentDocument).ready(function() {
        callback();
      });
      loop = false;
    }
  }

};
  var iframeSettings = function(editArea) {

  $(editArea).designMode = 'on';
  $(editArea.body).attr('contenteditable', true);

};

exports.setStylesheet = function(editArea) {

  $(editArea.head).append('<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,800" rel="stylesheet" type="text/css">');

};

exports.setCss = function(editArea) {

  $(editArea.body).css('padding', '15px');
  $(editArea.body).css('font-family', 'Open Sans, sans-serif');
  $(editArea.body).css('font-size', '13px');
  $(editArea.body).css('line-height', '1.6em');

}

exports.setWidth = function(iframe) {

  // Set iframe width
  iframe.width(iframe.parent().width());
  $(window).resize(function() {
    iframe.width(iframe.parent().width());
  });

};
;
  var getAction = function(element) {

    if(typeof(element.action) != 'undefined')
      return element.action;
      
    if(typeof(element.title) != 'undefined')
      return element.title;

};
;
  var backlightActiveTools = function(randomID, elements, actions) {

  $.each(actions, function() {
    var action = this;
    var match = false;

    $.each(elements, function() {
      var nodeName = this.nodeName;

      // Align property style name
      if(this.style.textAlign != '')
        nodeName = this.style.textAlign;

      if(typeof(action.nodeName) != 'undefined' && action.nodeName === nodeName)
        match = true;
    });

    if(match)
      $('#' + randomID).find('.wysiwygEditor-' + action.title).addClass('action-active');
    else
      $('#' + randomID).find('.wysiwygEditor-' + action.title).removeClass('action-active');
  });

};
;
  var bindClickToolbar = function(randomID, editArea, getAction, backlightActiveTools, actions) {

  $.each(actions, function(i) {
    $('#' + randomID).find('.wysiwygEditor-' + actions[i].title).bind('click', function(e) {
      e.preventDefault();
      editArea.body.focus();

      if(typeof(actions[i].value) != 'undefined') {
        var value = prompt(actions[i].desc);
        if(value != null)
          editArea.execCommand(getAction(actions[i]), false, value);
      } else {
        editArea.execCommand(getAction(actions[i]), false, null);
      }

      $(this).toggleClass('action-active');
      backlightActiveTools(randomID, $(editArea.getSelection().anchorNode).parents(), actions);
    });
  });
  
};
;
  var triggerContentChanged = function(randomID, editArea, textarea, backlightActiveTools, actions) {

  $.each(['click', 'keyup'], function() {
    $(editArea.body).bind(this.toString(), function(e) {
      if($(this).html() != textarea.val())
        $(this).trigger('contentChanged');

      // Update footer element indicator
      var footerElementIndicator = '';
      var elements = $(editArea.getSelection().anchorNode).parents();

      for(var i = elements.length - 1; i >= 0; i--) {
        footerElementIndicator += elements[i].nodeName;
        if(i != 0)
          footerElementIndicator+= ' &raquo; ';
      }

      $('#' + randomID).find('.wysiwygEditor-footer').html(footerElementIndicator);

      backlightActiveTools(randomID, elements, actions);
    });
  });

};

  // Hide original textarea
  textarea.css('display', 'none');
  textarea.addClass(randomID);

  // Create new wysiwygEditor
  textarea.before(markup(randomID, actions));
  var iframe = $('#' + randomID).find('iframe');

  iframeLoaded(iframe, function() {
    var editArea = iframe[0].contentDocument;

    // Set iframe width
    iframeSettings.setWidth(iframe);

    // Set iframe body to editable
    iframeSettings.setAttributes(editArea);

    // Iframe body styles
    iframeSettings.setStylesheet(editArea);
    iframeSettings.setCss(editArea);

    // Copy data from textarea to iframe
    $(editArea.body).html(textarea.val());

    // Bind click events for toolbar
    bindClickToolbar(randomID, editArea, getAction, backlightActiveTools, actions);

    // Trigger contentChanged
    triggerContentChanged(randomID, editArea, textarea, backlightActiveTools, actions);

    // Textarea synchronization
    $(editArea.body).on('contentChanged', function() {
      textarea.val($(this).html());
    });
  });

  return this;
}
