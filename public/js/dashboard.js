document.addEventListener('DOMContentLoaded', () => {
    const cardsData = [
        {
            title: 'Gestion des administrateurs',
            description: 'Gérez les accès et les autorisations des administrateurs du système de santé.',
            icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
            imageUrl: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&q=80&w=2070'
        },
        {
            title: 'Tableau de bord',
            description: 'Visualisez les indicateurs clés de performance et les métriques importantes.',
            icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>',
            imageUrl: 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&q=80&w=2076'
        },
        {
            title: 'Gestion des patients',
            description: 'Suivez et gérez les dossiers des patients en toute simplicité.',
            icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
            imageUrl: 'https://images.unsplash.com/photo-1581594693702-fbdc51b2763b?auto=format&fit=crop&q=80&w=2070'
        },
        {
            title: 'Planification des interventions',
            description: 'Organisez et suivez les interventions médicales et techniques.',
            icon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>',
            imageUrl: 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&q=80&w=2080'
        }
    ];

    const cardsContainer = document.getElementById('cardsContainer');
    cardsContainer.innerHTML = cardsData.map(card => `
        <div class="card">
            <div class="card-image">
                <img src="${card.imageUrl}" alt="${card.title}">
            </div>
            <div class="card-content">
                <div class="card-header">
                    <div class="card-icon">${card.icon}</div>
                    <h2 class="card-title">${card.title}</h2>
                </div>
                <p class="card-description">${card.description}</p>
            </div>
        </div>
    `).join('');
});
