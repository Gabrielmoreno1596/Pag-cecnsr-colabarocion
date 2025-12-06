document.addEventListener('DOMContentLoaded', () => {
    const profileTabs = document.querySelectorAll('#perfil .tabs-buttons .tab-button');
    const tabsContainer = document.querySelector('#perfil .tabs-container');

    if (!profileTabs.length || !tabsContainer) return;

    profileTabs.forEach(button => {
        button.addEventListener('click', function () {
            const targetTab = this.getAttribute('data-tab');

            profileTabs.forEach(btn => btn.classList.remove('active'));
            tabsContainer.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });

            this.classList.add('active');
            const activeContent = document.getElementById(targetTab);
            if (activeContent) activeContent.classList.add('active');
        });
    });

    profileTabs[0].click();
});
