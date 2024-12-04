document.querySelectorAll('.post-card').forEach(post => {
    post.addEventListener('click', function() {
        const postId = this.getAttribute('data-id');
        if (postId) {
            window.location.href = `/posts/${postId}`;
        }
    });
});
