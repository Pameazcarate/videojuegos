USE videojuegosdb;

-- Fragmento 1: Videojuegos económicos (precio <= 600)
SELECT * FROM videojuegos
WHERE precio <= 600;

-- Fragmento 2: Videojuegos premium (precio > 600)
SELECT * FROM videojuegos
WHERE precio > 600;
    
/*¿Qué justifica esta fragmentación?
- Permite organizar los videojuegos por accesibilidad económica.
- Mejora la visualización y navegación en la interfaz (botones: “Económicos” vs “Premium”).
- Facilita la defensa académica al mostrar cómo se usa SQL para segmentar datos.
*/