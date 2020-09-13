let root = $('.expander-root');

root.find('.expander-toggle:input:checkbox').change((e) => {
    let parent = $(e.target.closest('.expander-root'));
    let container = parent.find('.expander-container');

    // If no parent or container is found we exit.
    if (!parent || !container) return;

    // Disable inputs to avoid sending them to the server in case the checkbox is not checked.
    let inputs = container.find(':input');
    inputs.prop('disabled', !e.target.checked);

    // TODO: Add some fancy animation?
    if (e.target.checked) {
        container.removeClass('d-none');
    } else {
        container.addClass('d-none');
    }
});
