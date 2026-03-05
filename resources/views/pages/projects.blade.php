<x-site-layout 
    :title="'Projects | Anastasia Mamalikidou'"
    :description="'A selection of projects by Anastasia Mamalikidou, demonstrating full-stack web development skills and areas of focus.'"
    :headerTitle="'Projects'"
    :subtitle="'A selection of projects I’ve developed, showcasing skills and focus areas.'"
>

    <section class="projects-section">
        <h2>All projects</h2>
        <div class="card-grid">
            @forelse($projects as $project)
            
                <article class=" card project-card">
                    {{-- Title  --}}
                    <h3 class="card-title">{{ $project->title }}</h3>

                    {{-- Type --}}
                    @if($project->type)
                        <p class="card-meta">{{ $project->type }}</p>
                    @endif

                    {{-- Description --}}
                    @if($project->description)
                        <p class="card-text">{{ $project->description }}</p>
                    @endif

                    {{-- Highlights --}}
                    @if($project->highlights)
                        <ul class="card-list">
                            @foreach($project->highlights as $highlight)
                                <li class="card-list-item">{!! $highlight !!}</li>
                            @endforeach
                        </ul>
                    @endif

                    {{-- Links --}}
                    <div class="card-actions">
                        @if($project->github_url)
                            <a  href="{{ $project->github_url }}"
                                class="button-fire" 
                                target="_blank">
                                GitHub
                            </a>
                        @endif

                        @if($project->project_url)
                            <a  href="{{ $project->project_url }}" 
                                class="button-fire"
                                target="_blank">
                                Live Demo
                            </a>
                        @endif

                    </div>
                </article>
            

        @empty
                <p>No projects available at the moment. Check back soon!</p>
        @endforelse
        
        </div>
    </section>

</x-site-layout>