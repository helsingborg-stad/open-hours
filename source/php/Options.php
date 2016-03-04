<?php

namespace openhours;

class Options
{
    public function __construct()
    {
        add_action('init', array($this, 'registerOptionsPage'));
    }

    /**
     * Register options page
     * @return void
     */
    public function registerOptionsPage()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
            'page_title'    => __("Open Hours", 'opening-hours-slug'),
            'menu_title'    => __("Open Hours", 'opening-hours-slug'),
            'menu_slug'     => 'open-hours-settings',
            'capability'    => 'edit_posts',
            'icon_url'     => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiIHZpZXdCb3g9IjAgMCA3NS42OTUgNzUuNjk1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA3NS42OTUgNzUuNjk1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+PHBhdGggZD0iTTc1LjY5NSwzNy44NDZjMCwyMC44NjktMTYuOTgsMzcuODUtMzcuODQ4LDM3Ljg1QzE2Ljk4MSw3NS42OTUsMCw1OC43MTUsMCwzNy44NDZDMCwxNi45NzcsMTYuOTgxLDAsMzcuODQ4LDAgICBjNy42MjgsMCwxNS4wNTUsMi4zMzEsMjEuMzEsNi41OTJsNS44MTYtNS44MTdsNC42NzksMTcuOTQ2bC0xNy45NDktNC42NzhsNC4wNjktNC4wNzJjLTUuMzE5LTMuNDIyLTExLjUzOC01LjMtMTcuOTI5LTUuMyAgIGMtMTguMjk0LDAtMzMuMTc2LDE0Ljg4Mi0zMy4xNzYsMzMuMTc0YzAsMTguMjk0LDE0Ljg4MiwzMy4xNzgsMzMuMTc2LDMzLjE3OGMxOC4yOTMsMCwzMy4xNzUtMTQuODg0LDMzLjE3NS0zMy4xNzhINzUuNjk1eiAgICBNMjguNDI5LDM4LjE5MWMtMy4xODYsMi4yNDMtNS4zNTgsNC4xNzgtNi41MTEsNS44MTFjLTEuMTU0LDEuNjI5LTEuNzM0LDMuNTkxLTEuNzM0LDUuODgxdjAuMDA3aDE3LjA0NHYtNC4zMjdIMjYuMjkgICBsMC4wMTctMC4wMzZjMC44MjctMS4xNTIsMi4zNjMtMi40NDUsNC42MTYtMy44NzRjMi40MzItMS41NTYsNC4wOTItMi45NTQsNC45ODQtNC4xOTdjMC44ODMtMS4yNSwxLjMyMi0yLjgyMiwxLjMyMi00LjcxNiAgIGMwLTIuMzE0LTAuNzc2LTQuMTk5LTIuMzI3LTUuNjYyYy0xLjU3NC0xLjQ2NC0zLjU3OC0yLjE5My02LjA0LTIuMTkzYy0yLjYzNywwLTQuNzE4LDAuNzkzLTYuMjEyLDIuMzgxICAgYy0xLjUwMiwxLjU5My0yLjIxMywzLjczNy0yLjEzNSw2LjQ1NGg0LjgxNmMtMC4wNDYtMS40NiwwLjI0Ni0yLjYwNiwwLjg3Ni0zLjQ1NUMyNi44MzksMjkuNDIsMjcuNzEsMjksMjguODMsMjkgICBjMS4wNDMsMCwxLjg5NiwwLjMzOSwyLjUzMiwxLjAxNmMwLjY0NSwwLjY3MywwLjk1OSwxLjU2MSwwLjk1OSwyLjY3MmMwLDEuMDIxLTAuMjkyLDEuOTM5LTAuODc0LDIuNzczICAgQzMwLjg2OSwzNi4yODUsMjkuODY0LDM3LjIwMSwyOC40MjksMzguMTkxeiBNNDguNTg3LDQ5Ljg4OHYtNS41MDdoLTkuODl2LTIuMTI2di0yLjEyMWw5LjIzNy0xNS4yNDJoMi43NDZoMi43NDRWNDAuNDhoMi44MTIgICB2My45MDVoLTIuODEydjUuNTA2TDQ4LjU4Nyw0OS44ODhMNDguNTg3LDQ5Ljg4OHogTTQ4LjU4Nyw0MC40NzZWMzAuMDYybC02LjA2MywxMC4wNzFsLTAuMjA1LDAuMzQySDQ4LjU4N3ogTTM5LjM3OSw4LjUwOGgtMi4zMzYgICB2NC42ODNoMi4zMzZWOC41MDh6IE0zOS4zNzksNjEuNThoLTIuMzM2djQuNjgzaDIuMzM2VjYxLjU4eiBNNjcuMDg2LDM4LjU1M3YtMi4zMzZoLTQuNjg1djIuMzM2SDY3LjA4NnogTTE0LjAxNSwzOC41NTN2LTIuMzM2ICAgSDkuMzM0djIuMzM2SDE0LjAxNXoiIGZpbGw9IiNGRkZGRkYiLz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PC9zdmc+'
            ));
        }
    }
}