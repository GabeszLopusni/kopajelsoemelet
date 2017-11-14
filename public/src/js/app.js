var postId = 0;

$('.post').find('.interaction').find('.edit').on('click', function(event) {
  event.preventDefault();

  var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
  postId = event.target.parentNode.parentNode.dataset['postid'];
  $('#post-body').val(postBody);
  $('#edit-modal').modal();
});

$('#editProfile').on('click', function(event) {
  event.preventDefault();

  var email = event.target.parentNode.parentNode.childNodes[10].textContent;
  var birth = event.target.parentNode.parentNode.childNodes[14].textContent;
  var country = event.target.parentNode.parentNode.childNodes[18].textContent;

  $('#email').val(email);
  $('#born').val(country);
  $('#country').val(birth);
  $('#edit-modal-profile').modal();
});

$('#modal-save-post').on('click', function() {
  $.ajax({
    method: 'POST',
    url: url,
    data: { body: $('#post-body').val(), postId: postId, _token: token}
  })
  .done(function (msg) {
    console.log(JSON.stringify(msg));
  });
});

$('#modal-save-profile').on('click', function() {
  $.ajax({
    method: 'POST',
    url: url_prof,
    data: {userId: user_id, email: $('#email').val(), birth: $('#born').val(), country: $('#country').val(), _token: token}
  })
  .done(function (msg) {
    console.log(JSON.stringify(msg));
  })
});


  $('.like').on('click', function(event) {
    console.log(event);
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId, _token: token}
    })
        .done(function() {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
});
