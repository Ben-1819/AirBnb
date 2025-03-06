<x-app-layout>
    <div id="app">
        <store-location/>
    </div>
</x-app-layout>


    <!--/*window.addEventListener('load', () => {
        mapboxsearch.config.accessToken = ACCESS_TOKEN;

        // Add confirmation prompt to shipping address
        const form = document.querySelector("form");
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const result = await mapboxsearch.confirmAddress(form, {
                theme: { variables: { border: '3px solid rgba(0,0,0,0.35)', borderRadius: '18px' } },
                minimap: {
                    defaultMapStyle: ['mapbox', 'outdoors-v11'],
                    satelliteToggle: true
                },
                skipConfirmModal: (feature) => false // overrides default behavior, show dialog every time
            });
            console.log(result);
        });
    });-->
