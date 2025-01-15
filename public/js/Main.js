document.addEventListener('DOMContentLoaded', () => {
  const pageButtons = document.querySelectorAll('.page-button');
  const pageContainers = document.querySelectorAll('.page-input-container');
  const markdownButtons = document.querySelectorAll('#markdown');

  // Get the last active page from localStorage (if it exists)
  const activePageId = localStorage.getItem('activePageId');

  // If there's an active page ID, display its container
  if (activePageId) {
    pageContainers.forEach(container => {
      container.style.display = 'none';
    });

    const targetContainer = document.getElementById(`page-container-${activePageId}`);
    if (targetContainer) {
      targetContainer.style.display = 'block';

      // Update the URL based on the title of the active page
      const activePageButton = document.querySelector(`.page-button[data-page-id="${activePageId}"]`);
      if (activePageButton) {
        const pageTitle = activePageButton.textContent.trim().replace(/\s+/g, '_');
        history.replaceState({}, '', `/main/${pageTitle}`);
      }
    }
  } else {
    // If no active page is stored, show the first page by default
    pageContainers.forEach((container, index) => {
      container.style.display = index === 0 ? 'block' : 'none';
    });

    // Update the URL to the first page title
    const firstPageButton = pageButtons[0];
    if (firstPageButton) {
      const pageTitle = firstPageButton.textContent.trim().replace(/\s+/g, '_');
      history.replaceState({}, '', `/main/${pageTitle}`);
    }
  }

  pageButtons.forEach(button => {
    button.addEventListener('click', (event) => {
      event.preventDefault();

      const pageId = button.getAttribute('data-page-id');

      // Hide all page containers
      pageContainers.forEach(container => {
        container.style.display = 'none';
      });

      // Show the container for the clicked page
      const targetContainer = document.getElementById(`page-container-${pageId}`);
      if (targetContainer) {
        targetContainer.style.display = 'block';
      }

      // Save the active page ID in localStorage
      localStorage.setItem('activePageId', pageId);

      // Update the URL with the page title
      const pageTitle = button.textContent.trim().replace(/\s+/g, '_'); // Replace spaces with underscores
      history.pushState({}, '', `/main/${pageTitle}`);
    });
  });

  function convertToMarkdown(pageId) {
    const editorContent = document.getElementById(`editor-${pageId}`).innerHTML;
    const turndownService = new TurndownService();

    // Convert the editor content to Markdown
    const markdown = turndownService.turndown(editorContent);

    // Set the converted Markdown back into the editor's content area
    document.getElementById(`editor-${pageId}`).innerHTML = markdown;

    // Optional: Display the markdown in the output area if needed
    document.getElementById("markdownOutput").innerHTML = markdown;
    document.getElementById("markdownOutput").classList.remove("hidden");

    // Focus the editor back
    document.getElementById(`editor-${pageId}`).focus();
  }

  function convertToHtml(pageId) {
    const markdownContent = document.getElementById(`editor-${pageId}`).innerHTML;

    // Initialize the markdown-it parser
    const markdownIt = window.markdownit();

    // Convert the markdown to HTML
    const htmlContent = markdownIt.render(markdownContent); // Converts Markdown to HTML

    // Set the converted HTML back into the editor's content area
    document.getElementById(`editor-${pageId}`).innerHTML = htmlContent;

    // Optionally hide the markdown output if it is shown
    document.getElementById("markdownOutput").classList.add("hidden");

    // Focus the editor back
    document.getElementById(`editor-${pageId}`).focus();
  }

  // Add event listeners to convert markdown to HTML
  const htmlButtons = document.querySelectorAll('.turndown-button');
  htmlButtons.forEach(button => {
    button.addEventListener('click', (event) => {
      const pageId = button.getAttribute('data-page-id');
      convertToHtml(pageId);
    });
  });
});
