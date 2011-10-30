<ul class="addTop">
    <li><h3>Dashboard</h3></li>
</ul>
<div class="tabs">
    <ul>
        <li><a href="#fragment-1">General stats</a></li>
    </ul>
    <div id="fragment-1">
        <div class="statistics">
            <ul class="stats">
                <li>
                    <span class="statsVis"><?= (empty($visitors['ga:visits']) ? 0 : $visitors['ga:visits']); ?></span>
                    total visits in last month
                </li>
                <li>
                    <ul>
                        <li>
                            <span class="statsVis"><?= (empty($visitors['ga:uniquePageviews']) ? 0 : $visitors['ga:uniquePageviews']); ?></span>
                            unique visits
                        </li>
                        <li class="last">
                            <span class="statsVie"><?= (empty($visitors['ga:uniquePageviews']) ? 0 : $visitors['ga:pageviews']); ?></span>
                            page views
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <span class="statsVis"><?= (empty($visitors['ga:bounces']) ? 0 : $visitors['ga:bounces']); ?></span>
                            bounces
                        </li>
                        <li class="last">
                            <span class="statsVis"><?= (empty($visitors['ga:newVisits']) ? 0 : $visitors['ga:newVisits']); ?></span>
                            new visitors
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="stats">
                <li>
                    <span class="statsVis"><?= (empty($visitorsToday['ga:visits']) ? 0 : $visitorsToday['ga:visits']); ?></span>
                    visits today
                </li>
                <li>
                    <ul>
                        <li>
                            <span class="statsVie"><?= @$visitorsToday['ga:timeOnSite']; ?></span>
                            time on site
                        </li>
                        <li class="last">
                            <span class="statsVie"><?= @$visitorsToday['average_time_on_site_formatted']; ?></span>
                            average time
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <span class="statsVie"><?= @$visitorsToday['pages_per_visit']; ?></span>
                            pages per visit
                        </li>
                        <li class="last">
                            <span class="statsVie"><?= (empty($visitorsToday['ga:pageviews']) ? 0 : $visitorsToday['ga:pageviews']); ?></span>
                            page views
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>


