const CACHE_NAME = 'kisiyeozel-v1';
const STATIC_CACHE = 'kisiyeozel-static-v1';

self.addEventListener('install', event => {
    self.skipWaiting();
});

self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(keys =>
            Promise.all(keys.filter(k => k !== CACHE_NAME && k !== STATIC_CACHE).map(k => caches.delete(k)))
        )
    );
    self.clients.claim();
});

self.addEventListener('fetch', event => {
    const { request } = event;
    if (request.method !== 'GET') return;

    if (request.destination === 'image') {
        event.respondWith(
            caches.match(request).then(cached => cached || fetch(request).then(response => {
                const clone = response.clone();
                caches.open(STATIC_CACHE).then(cache => cache.put(request, clone));
                return response;
            }))
        );
        return;
    }

    event.respondWith(
        fetch(request).then(response => {
            if (response && response.status === 200) {
                const clone = response.clone();
                caches.open(CACHE_NAME).then(cache => cache.put(request, clone));
            }
            return response;
        }).catch(() => caches.match(request).then(cached => cached || new Response('Offline', { status: 503 })))
    );
});
