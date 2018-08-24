$(function(){

    // Storing some elements in variables for a cleaner code base

    let refreshButton = $('h1 img'),
        shoutboxForm  = $('.shoutbox-form'),
        form = shoutboxForm.find('form'),
        closeForm = shoutboxForm.find('h2 span'),
        nameElement = form.find('#shoutbox-name'),
        commentElement = form.find('#shoutbox-comment'),
        ul = $('ul.shoutbox-content');

    emojione.ascii = true; // Replace :) with emoji icons:

    load(); // Load the comments.

    let canPostComment = true; // On form submit, if everything is filled in, publish the shout to the database

    form.submit(function(e){
        e.preventDefault();

        if(!canPostComment) return;

        let name    = nameElement.val().trim();
        let comment = commentElement.val().trim();

        if (name.length && comment.length && comment.length < 240) {
            publish(name, comment);
            canPostComment = false; // Prevent new shouts from being published
            setTimeout(function(){
                canPostComment = true;
            }, 5000); // Allow a new comment to be posted after 5 seconds

        }

    });
    
    // Toggle the visibility of the form.
    
    shoutboxForm.on('click', 'h2', function(e){
        (form.is(':visible')) ? formClose() : formOpen();
    });
    
    // Clicking on the REPLY button writes the name of the person you want to reply to into the textbox.
    
    ul.on('click', '.shoutbox-comment-reply', function(e){
        let replyName = $(this).data('name');

        formOpen();
        commentElement.val('@'+replyName+' ').focus();
    });
    
    // Clicking the refresh button will force the load function

    let canReload = true;

    refreshButton.click(function(){
        if (!canReload) return false;
        
        load();
        canReload = false;

        // Allow additional reloads after 2 seconds
        setTimeout(function(){
            canReload = true;
        }, 2000);
    });

    // Automatically refresh the shouts every 20 seconds
    setInterval(load, 20000);

    function formOpen(){
        if (form.is(':visible')) return;

        form.slideDown();
        closeForm.fadeIn();
    }

    function formClose(){
        if (!form.is(':visible')) return;

        form.slideUp();
        closeForm.fadeOut();
    }

    // Store the shout in the database
    function publish(name,comment){
        $.post('publish.php', {name: name, comment: comment}, function(){
            nameElement.val("");
            commentElement.val("");
            load();
        });
    }
    
    // Fetch the latest shouts
    function load(){
        $.getJSON('./load.php', function(data) {
            appendComments(data);
        });
    }
    
    // Render an array of shouts as HTML
    
    function appendComments(data) {
        ul.empty();

        data.forEach(function(d){
            ul.append('<li>'+
                '<span class="shoutbox-username">' + d.name + '</span>'+
                '<p class="shoutbox-comment">' + emojione.toImage(d.text) + '</p>'+
                '<div class="shoutbox-comment-details"><span class="shoutbox-comment-reply" data-name="' + d.name + '">REPLY</span>'+
                '<span class="shoutbox-comment-ago">' + d.timeAgo + '</span></div>'+
            '</li>');
        });
    }

});