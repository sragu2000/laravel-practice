INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Gajen', 'gajen007@gmail.com', 'gajen123', NULL, NULL),
(2, 'Sugir', 'sugir@gmail.com', 'sugir123', NULL, NULL);

INSERT INTO `vehicles` (`id`, `makeName`, `brandName`, `modelName`, `created_at`, `updated_at`) VALUES
(1, 'Sedan', 'Honda', 'Civic', NULL, NULL),
(2, 'Sedan', 'Toyota', 'Corolla', NULL, NULL),
(3, 'SUV', 'Toyota', 'Highlander', NULL, NULL);

INSERT INTO `users_vehicles` (`user_id`, `vehicle_id`) VALUES
(2, 2),
(1, 1),
(2, 3),
(1, 2);