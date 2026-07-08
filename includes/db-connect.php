<?php
declare(strict_types=1);

/**
 * Selam Luxe — Supabase REST API Client
 * No MySQL needed! Uses Supabase's auto-generated REST API
 */

class SupabaseClient {
    private string $url;
    private string $key;
    
    public function __construct() {
        // These come from Vercel Environment Variables
        $this->url = $_ENV['SUPABASE_URL'] ?? '';
        $this->key = $_ENV['SUPABASE_ANON_KEY'] ?? '';
    }
    
    /**
     * Query data from a table
     */
    public function query(string $table, array $filters = []): array {
        $url = $this->url . '/rest/v1/' . $table;
        
        if (!empty($filters)) {
            $url .= '?' . http_build_query($filters);
        }
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'apikey: ' . $this->key,
            'Authorization: Bearer ' . $this->key,
            'Content-Type: application/json'
        ]);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($response, true) ?? [];
    }
    
    /**
     * Insert data into a table
     */
    public function insert(string $table, array $data): bool {
        $url = $this->url . '/rest/v1/' . $table;
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'apikey: ' . $this->key,
            'Authorization: Bearer ' . $this->key,
            'Content-Type: application/json',
            'Prefer: return=minimal'
        ]);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return $httpCode === 201;
    }
}

// Global instance
$supabase = new SupabaseClient();