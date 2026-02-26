CREATE DATABASE IF NOT EXISTS agriculture_system;
USE agriculture_system;

CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    psw VARCHAR(100) NOT NULL
);

INSERT INTO admin (name, psw) VALUES ('admin', 'admin123');

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mobile VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    password VARCHAR(100) NOT NULL,
    registered_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS crops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    crop_name VARCHAR(200) NOT NULL,
    soil_type VARCHAR(100) NOT NULL,
    fertilizer VARCHAR(200) NOT NULL,
    water_irrigation VARCHAR(200) NOT NULL,
    season VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    added_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO crops 
(crop_name, soil_type, fertilizer, water_irrigation, season, description, added_date)
VALUES

-- ================= MONSOON (Kharif) CROPS =================
('Rice', 'Clayey Soil', 'NPK Fertilizer', 'High Water Supply', 'Monsoon',
 'Rice is a major food crop grown in heavy rainfall areas.', '2026-02-25'),

('Maize', 'Loamy Soil', 'Nitrogen Fertilizer', 'Moderate Irrigation', 'Monsoon',
 'Maize requires warm climate and moderate rainfall.', '2026-02-25'),

('Cotton', 'Black Soil', 'Phosphorus Fertilizer', 'Moderate Water', 'Monsoon',
 'Cotton is a fiber crop grown in black soil regions.', '2026-02-25'),

('Sugarcane', 'Alluvial Soil', 'Organic Manure', 'High Irrigation', 'Monsoon',
 'Sugarcane needs high rainfall and warm temperature.', '2026-02-25'),

('Groundnut', 'Sandy Loam Soil', 'Potassium Fertilizer', 'Moderate Water', 'Monsoon',
 'Groundnut is an oilseed crop grown in rainy season.', '2026-02-25'),

('Soybean', 'Loamy Soil', 'NPK Fertilizer', 'Moderate Irrigation', 'Monsoon',
 'Soybean is widely grown during monsoon season.', '2026-02-25'),

('Bajra', 'Sandy Soil', 'Nitrogen Fertilizer', 'Low Water', 'Monsoon',
 'Bajra grows well in low rainfall areas.', '2026-02-25'),

('Jute', 'Alluvial Soil', 'Organic Manure', 'High Water Supply', 'Monsoon',
 'Jute is a fiber crop grown in humid climate.', '2026-02-25'),

('Tur Dal', 'Black Soil', 'Phosphorus Fertilizer', 'Moderate Water', 'Monsoon',
 'Tur is a pulse crop grown during rainy season.', '2026-02-25'),

('Ragi', 'Red Soil', 'Compost', 'Low Irrigation', 'Monsoon',
 'Ragi is a millet crop suitable for dry regions.', '2026-02-25'),


-- ================= WINTER (Rabi) CROPS =================
('Wheat', 'Loamy Soil', 'NPK Fertilizer', 'Moderate Irrigation', 'Winter',
 'Wheat is a major Rabi crop grown in cool climate.', '2026-02-25'),

('Barley', 'Sandy Loam Soil', 'Nitrogen Fertilizer', 'Low Irrigation', 'Winter',
 'Barley grows well in dry winter conditions.', '2026-02-25'),

('Mustard', 'Alluvial Soil', 'Organic Manure', 'Low Irrigation', 'Winter',
 'Mustard is an oilseed crop grown in winter season.', '2026-02-25'),

('Gram', 'Sandy Soil', 'Organic Fertilizer', 'Low Water', 'Winter',
 'Gram is a pulse crop grown in winter.', '2026-02-25'),

('Peas', 'Loamy Soil', 'Compost', 'Moderate Water', 'Winter',
 'Peas grow well in cool temperature.', '2026-02-25'),

('Lentil', 'Clay Loam Soil', 'Phosphorus Fertilizer', 'Low Irrigation', 'Winter',
 'Lentil is a winter pulse crop.', '2026-02-25'),

('Linseed', 'Alluvial Soil', 'Organic Manure', 'Low Water', 'Winter',
 'Linseed is grown for oil production.', '2026-02-25'),

('Oats', 'Loamy Soil', 'Nitrogen Fertilizer', 'Moderate Water', 'Winter',
 'Oats are grown as fodder and grain crop.', '2026-02-25'),

('Coriander', 'Sandy Loam Soil', 'Compost', 'Low Irrigation', 'Winter',
 'Coriander is a spice crop grown in winter.', '2026-02-25'),

('Fenugreek', 'Alluvial Soil', 'Organic Manure', 'Low Water', 'Winter',
 'Fenugreek is a leafy vegetable grown in winter.', '2026-02-25'),


-- ================= SUMMER (Zaid) CROPS =================
('Watermelon', 'Sandy Soil', 'Organic Manure', 'Regular Irrigation', 'Summer',
 'Watermelon is a fruit crop grown in hot climate.', '2026-02-25'),

('Muskmelon', 'Sandy Soil', 'Compost', 'Frequent Watering', 'Summer',
 'Muskmelon grows well in summer season.', '2026-02-25'),

('Cucumber', 'Loamy Soil', 'Organic Fertilizer', 'Regular Irrigation', 'Summer',
 'Cucumber needs warm temperature.', '2026-02-25'),

('Pumpkin', 'Sandy Loam Soil', 'Organic Manure', 'Moderate Water', 'Summer',
 'Pumpkin is a vegetable crop grown in summer.', '2026-02-25'),

('Bitter Gourd', 'Loamy Soil', 'Compost', 'Frequent Irrigation', 'Summer',
 'Bitter gourd grows well in hot weather.', '2026-02-25'),

('Bottle Gourd', 'Sandy Loam Soil', 'Organic Manure', 'Moderate Water', 'Summer',
 'Bottle gourd is cultivated during summer.', '2026-02-25'),

('Ridge Gourd', 'Loamy Soil', 'Compost', 'Regular Irrigation', 'Summer',
 'Ridge gourd needs warm climate.', '2026-02-25'),

('Tomato', 'Sandy Loam Soil', 'NPK Fertilizer', 'Moderate Irrigation', 'Summer',
 'Tomato grows well in warm summer season.', '2026-02-25'),

('Chilli', 'Red Soil', 'Organic Manure', 'Moderate Water', 'Summer',
 'Chilli is grown in hot and dry climate.', '2026-02-25'),

('Fodder Maize', 'Loamy Soil', 'Nitrogen Fertilizer', 'Moderate Irrigation', 'Summer',
 'Fodder maize is grown for animal feed in summer.', '2026-02-25');
