USE `crams_database`;

INSERT INTO `employee` (`id`, `idnumber`, `pm_id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `picture`, `type`, `contact`, `email`, `address`, `code`, `status`, `date_hired`, `date_resignation`, `date`) VALUES
(1, '08305570', 0, 'eminence43rd', 'a4cf53e4a811eb524ae52757d371f9146fd463be4f2f26e75b2049de91eca63dfab4ac169d432c2cd8adc54f88c1356a92a36295ca04e8ef818bc00516928267qreRYwDMquQXEcO/EDsDhe33r8lIQQIP7LQqZl3QqAI=', 'Bryan', 'Ramirez', 'Chu', 'default.png', 'regular_employee', '9254854606', 'eminence43rd@gmail.com', '725 Climaco Street, Poblacion, Carmen, Cebu', '21c7e4032a5a4f38c219f16c6891f3aaa0f43b179', 1, '2015-09-27', NULL, '2015-09-27'),
(2, '08051191', 0, 'nikkie_chix', 'e1c48d873be8cb5ea2665ec93aa801dd9a6150e40fbc30bc9abf2826c83a0a5f4ed7cdd57b2186dec36b26493bba1c6a2c5e786322207ede64bc17ed1d5549b58/ALKGoFDh2VCisZ8PG+HZUrYzfW8jCaddz8VO5L3VU=', 'Mary Elaine', 'Chu', 'Remarca', 'default.png', 'regular_employee', '9238871393', 'nikkie_chix@gmail.com', '699 Pueblo Street, Poblacion, Carmen, Cebu', '21c7e4032a5a49iok719f16c6891f3aaa0f43b179', 1, '2015-09-29', NULL, '2015-09-29');

INSERT INTO `salary` (`id`, `employee_id`, `rate`) VALUES
(1, 1, 390),
(2, 2, 250);